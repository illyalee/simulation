<?php
require_once "Creature.php";

class Herbivore extends Creature
{
    public function make_move(Map $map): bool
    {

        $prey = $this->getCreatureAround($this->y, $this->x, $map);
        if ($prey) {
            $this->attack($prey, $map);
            return true;
        }
        $this->changePosition($map);
        return true;
    }

    public function changePosition(Map $map): bool
    {
        $pathSearch = new PathSearch();
        $coords = $pathSearch->search([$this->y, $this->x], $map);
        $map->move_object($this->y, $this->x, $coords[1]['y'], $coords[1]['x']);
        return true;
    }

    public function getCreatureAround($y, $x, Map $map)
    {
//      $attackRange = 1;
        $leftSideObjects = ($x - 1) >= 0 ? $map->mapArr[$y][$x - 1] : null;
        $rightSideObjects = ($x + 1) < count($map->mapArr[0]) ? $map->mapArr[$y][$x + 1] : null;
        $upSideObjects = ($y - 1) >= 0 ? $map->mapArr[$y - 1][$x] : null;
        $downSideObjects = ($y + 1) < count($map->mapArr) ? $map->mapArr[$y + 1][$x] : null;
        $neighbors = array($upSideObjects, $downSideObjects, $leftSideObjects, $rightSideObjects);
        foreach ($neighbors as $neighbor) {
            if ($neighbor == null || $neighbor instanceof Herbivore || $neighbor instanceof Predator || $neighbor instanceof Rock) continue;
            return $neighbor;
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

    public function getName()
    {
        return $this->name;
    }
}