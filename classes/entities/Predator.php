<?php

require_once "classes/entities/Creature.php";
require_once "classes/search/PathSearch.php";

class Predator extends Creature
{
    public int $power;

    public function __construct(int $y, int $x, $name, $health, $power)
    {
        parent::__construct($y, $x, $name, $health);
        $this->power = $power;
    }

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

    private function searchFoodAround($pointY, $pointX, Map $map, Coordinates $coordinates): Herbivore|null
    {
        $coordsInRange = $coordinates->getCoordsInRangeByPoint(1, $pointY, $pointX, $map, $coordinates);
        foreach ($coordsInRange as [$y, $x]) {
            $entity = $map->getEntity($y, $x);
            if ($entity instanceof Herbivore) {
                return $entity;
            }
        }
        return null;
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

    private function attack($pray, Map $map): void
    {
        //выборать кого атаковать если есть коорды
        //сама атака, продумать логику взаимодействий
        $pray->health = $pray->health - $this->power;
        echo "pray health: " . $pray->health;
        if ($pray->health <= 0) {
            $map->mapArr[$pray->y][$pray->x] = null;
            unset($pray);
        }
    }

    public function getName()
    {
        return $this->name;
    }
}
