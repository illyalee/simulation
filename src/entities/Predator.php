<?php

namespace Src\Entities;

use Src\World\{Map, Coordinates};
use Src\Search\PathSearch;


require_once "Creature.php";
require_once __DIR__ . "/../search/PathSearch.php";


class Predator extends Creature
{
    public int $power = 3;
    public int $health = 10;

    public function makeMove(Map $map, $coordinates): bool
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
        $coordsInRange = $coordinates->getCoordsInRangeByPoint($pointY, $pointX, $map, $coordinates);
        foreach ($coordsInRange as [$y, $x]) {
            $entity = $map->getEntity($y, $x);
            if ($entity instanceof Herbivore) {
                echo "Herbivore around, try to kill it...";
                return $entity;
            }
        }
        return null;
    }

    private function changePosition(Map $map): void
    {
        $pathSearch = new PathSearch();
        $coords = $pathSearch->findPath([$this->y, $this->x], $map);
        if ($coords) {
            $map->changeCreaturePosition($this->y, $this->x, $coords[1]['y'], $coords[1]['x']);
        }
    }

    private function attack(Herbivore $pray, Map $map): void
    {
        echo $pray->getHealth();
        echo "\n";
        $pray->setHealth($pray->getHealth() - $this->power);
        echo $pray->getHealth();
        echo "\n";

        if ($pray->getHealth() <= 0) {
            echo "prey is dead;";
            $map->unsetEntity($pray->y, $pray->x);
        }
    }
}
