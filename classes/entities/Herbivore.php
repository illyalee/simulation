<?php
require_once "Creature.php";

class Herbivore extends Creature
{

    public function make_move(Map $map, $coordinates): bool
    {
        if ($this->tryToAttack($map, $coordinates)) {
            return true;
        }
        $this->changePosition($map);
        return $this->tryToAttack($map, $coordinates);
    }

    private function tryToAttack(Map $map, $coordinates): bool
    {
        $prey = $this->searchFoodAround($this->y, $this->x, $map, $coordinates);
        if ($prey) {
            $this->attack($prey, $map);
            return true;
        }
        return false;
    }

    private function searchFoodAround($pointY, $pointX, Map $map, Coordinates $coordinates): Grass|null
    {
        $coordsInRange = $coordinates->getCoordsInRangeByPoint(1, $pointY, $pointX, $map, $coordinates);
        foreach ($coordsInRange as [$y, $x]) {
            $entity = $map->getEntity($y, $x);
            if ($entity instanceof Grass) {
                return $entity;
            }
        }
        return null;
    }


    public function attack($pray, Map $map): void
    {
        if ($pray) {
            $this->health += 3;
            $map->mapArr[$pray->y][$pray->x] = null;
            unset($pray);
        }
    }

    private function changePosition(Map $map): bool
    {
        $pathSearch = new PathSearch();
        $coords = $pathSearch->search([$this->y, $this->x], $map);
        if ($coords) {
            $map->moveCreature($this->y, $this->x, $coords[1]['y'], $coords[1]['x']);
        }
        return true;
    }

    public function getName()
    {
        return $this->name;
    }
}