<?php

namespace Src\Actions;

use Src\World\Coordinates;
use src\world\Map;
use Src\Entities\EntitiesFactory;

class InitActions
{
    public function initCreatures(Map $map, int $predatorsQty, int $herbivoresQty): void
    {
        $this->spawnEntitiesOnTheMap($map, 'predator', $predatorsQty);
        $this->spawnEntitiesOnTheMap($map, 'herbivore', $herbivoresQty);
        $this->spawnEntitiesOnTheMap($map, 'grass', 15);
        $this->spawnEntitiesOnTheMap($map, 'rock', 10);
    }

    public function spawnEntitiesOnTheMap(Map $map, $type, $qty): bool
    {
        $counter = 0;
        while ($qty >= $counter) {
            $this->spawnOneEntityOnTheMap($map, $type);
            $counter++;
        }
        return true;
    }

    private function spawnOneEntityOnTheMap(Map $map, $type): void
    {
        $freeCoords = Coordinates::getFreeCellsCoords($map);
        if (!empty($freeCoords)) {
            $coords = $freeCoords[array_rand($freeCoords)];
            $entity = EntitiesFactory::create($type);
            $entity->updateCoords($coords['y'], $coords['x']);
            $map->setEntity($entity, $coords['y'], $coords['x']);
        }
    }
}
