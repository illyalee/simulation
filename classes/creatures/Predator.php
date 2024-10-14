<?php

require_once "classes/creatures/Creature.php";

class Predator extends Creature
{
    public function __construct($name, $health, $power, $y, $x)
    {
        parent::__construct($name, $health, $power, $y, $x);
    }

    public function make_move(Map $map, $pathSearch)
    {
        $prey = $this->getCreatureAround($this->y, $this->x, $map);
        if($prey) {
            $this->attack($prey, $map);
        }

    }

    public function getCreatureAround($y, $x, Map $map)
    {
        $attackRange = 1;
        $leftSideObjects = ($x - 1) >= 0 ? $map->mapArr[$y][$x - 1] : null;
        $rightSideObjects = ($x + 1) < count($map->mapArr[0]) ? $map->mapArr[$y][$x + 1] : null;
        $upSideObjects = ($y - 1) >= 0 ? $map->mapArr[$y - 1][$x] : null;
        $downSideObjects = ($y + 1) < count($map->mapArr) ? $map->mapArr[$y + 1][$x] : null;
        $herbivores = array($upSideObjects, $downSideObjects, $leftSideObjects, $rightSideObjects);
        foreach ($herbivores as $herbivore) {
            if ($herbivore == null) continue;
            return $herbivore;
        }
        return null;
    }

    public function attack($pray, Map $map): void
    {
        $pray->health = $pray->health - $this->health;
        if ($pray->health <= 0) {
            $map->mapArr[$pray->y][$pray->x] = null;
        }
    }

    public function getName()
    {
        return $this->name;
    }
}
