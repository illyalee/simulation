<?php

namespace Src\Entities;

use Src\World\{Map, Coordinates};
use Src\Search\PathSearch;

require_once "Creature.php";
require_once __DIR__ . "/../search/PathSearch.php";

class Predator extends Creature
{
    private int $power = 3;

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

    private function searchFoodAround($pointY, $pointX, Map $map, Coordinates $coordinates): Herbivore|null
    {
        $coordsInRange = $coordinates->getCoordsInRangeByPoint($pointY, $pointX, $map, $coordinates);
        foreach ($coordsInRange as [$y, $x]) {
            $entity = $map->getEntity($y, $x);
            if ($entity instanceof Herbivore) {
                return $entity;
            }
        }
        return null;
    }

    private function changePosition(Map $map, $coordinates): void
    {
        $pathSearch = new PathSearch();
        $coords = $pathSearch->findPath([$this->getY(), $this->getX()], $map, $coordinates);
        if (empty($coords)) {
            return;
        }
        $map->changeCreaturePosition($this->getY(), $this->getX(), $coords[1]['y'], $coords[1]['x']);
    }

    private function attack(Herbivore $pray, Map $map): void
    {
        $pray->setHealth($pray->getHealth() - $this->power);

        if ($pray->getHealth() <= 0) {
            $map->unsetEntity($pray->getY(), $pray->getX());
        }
    }
}
