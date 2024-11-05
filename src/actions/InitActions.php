<?php

namespace Src\Actions;

use Src\World\Coordinates;
use src\world\Map;
use Src\Entities\{Predator, Herbivore, Rock, Grass, EntitiesFactory};

class InitActions
{
    public function initCreatures(Map $map, int $predatorsQty, int $herbivoresQty): bool
    {
        $werePredatorsSpawn = $this->spawnEntitiesOnTheMap($map, 'predator', $predatorsQty);
        $wereHerbivoresSpawn = $this->spawnEntitiesOnTheMap($map, 'herbivore', $herbivoresQty);
        $wereGrassSpawn = $this->spawnEntitiesOnTheMap($map, 'grass', 15);
        if ($werePredatorsSpawn && $wereHerbivoresSpawn) {
            return true;
        }
        return false;
    }

    private function spawnEntitiesOnTheMap(Map $map, $type, $qty): bool
    {
        $counter = 0;
        while ($qty >= $counter) {
            $wasSpawn = $this->spawnOneEntityOnTheMap($map, $type);
            if (!$wasSpawn) {
                return false;
            }
            $counter++;
        }
        return true;
    }

    private function spawnOneEntityOnTheMap(Map $map, $type): bool
    {
        $freeCoords = Coordinates::getFreeCellsCoords($map);
        if (!empty($freeCoords)) {
            $coords = $freeCoords[array_rand($freeCoords, 1)];
            $entity = EntitiesFactory::create($type);
            $entity->updateCoords($coords['y'], $coords['x']);
            $map->setEntity($entity, $coords['y'], $coords['x']);
            return true;
        }
        return false;
    }
}
