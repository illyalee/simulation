<?php

namespace Src\Entities;

use Src\World\{Map, Coordinates};
use Src\Search\PathSearch;

require_once "Creature.php";
require_once __DIR__ . "/../search/PathSearch.php";

class Herbivore extends Creature
{
    private int $speed = 2;

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
        $prey = $this->searchFoodAround($this->getY(), $this->getX(), $map, $coordinates);
        if ($prey) {
            $this->attack($prey, $map);
            return true;
        }
        return false;
    }

    private function searchFoodAround($pointY, $pointX, Map $map, Coordinates $coordinates): Grass|null
    {
        $coordsInRange = $coordinates->getCoordsInRangeByPoint($pointY, $pointX);
        foreach ($coordsInRange as [$y, $x]) {
            $entity = $map->getEntity($y, $x);
            if ($entity instanceof Grass) {
                return $entity;
            }
        }
        return null;
    }

    private function attack(Grass $pray, Map $map): void
    {
        if ($pray) {
            $this->setHealth($this->getHealth() + 3);
            $map->unsetEntity($pray->getY(), $pray->getX());
        }
    }

    private function changePosition(Map $map, $coordinates): void
    {
        $pathSearch = new PathSearch();
        $coords = $pathSearch->findPath([$this->getY(), $this->getX()], $map, $coordinates);
        if (empty($coords)) {
            return;
        }
        if (count($coords) > 3) {
            $map->changeCreaturePosition(
                $this->getY(),
                $this->getX(),
                $coords[$this->speed]['y'],
                $coords[$this->speed]['x']
            );
            return;
        }
        $map->changeCreaturePosition($this->getY(), $this->getX(), $coords[1]['y'], $coords[1]['x']);
    }
}