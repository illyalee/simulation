<?php

namespace Src\Entities;

use Src\World\{Map, Coordinates};
use Src\Search\PathSearch;

require_once "Creature.php";
require_once __DIR__ . "/../search/PathSearch.php";

class Herbivore extends Creature
{
    public int $health = 10;
    public int $speed = 2;

    public function makeMove(Map $map, $coordinates): bool
    {
        if ($this->tryToAttack($map, $coordinates)) {
            return true;
        }
        $this->changePosition($map, $coordinates);
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
        $coordsInRange = $coordinates->getCoordsInRangeByPoint($pointY, $pointX, $map, $coordinates);
        foreach ($coordsInRange as [$y, $x]) {
            $entity = $map->getEntity($y, $x);
            if ($entity instanceof Grass) {
                return $entity;
            }
        }
        return null;
    }

    private function attack($pray, Map $map): void
    {
        if ($pray) {
            $this->setHealth($this->getHealth() + 3);
            $map->unsetEntity($pray->y, $pray->x);
        }
    }

    private function changePosition(Map $map, $coordinates): void
    {
        $pathSearch = new PathSearch();
        $coords = $pathSearch->findPath([$this->y, $this->x], $map, $coordinates);
        if (empty($coords)) {
            return;
        }
        if (count($coords) > 3) {
            $map->changeCreaturePosition($this->y, $this->x, $coords[$this->speed]['y'], $coords[$this->speed]['x']);
            return;
        }
        $map->changeCreaturePosition($this->y, $this->x, $coords[1]['y'], $coords[1]['x']);
    }
}