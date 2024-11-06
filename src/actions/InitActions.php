<?php

namespace Src\Actions;

use Src\World\Coordinates;
use src\world\Map;
use Src\Entities\{Predator, Herbivore, Rock, Grass, EntitiesFactory};

class InitActions
{
    public function initCreatures(Map $map, int $predatorsQty, int $herbivoresQty): void
    {
        $this->spawnEntitiesOnTheMap($map, 'predator', $predatorsQty);
        $this->spawnEntitiesOnTheMap($map, 'herbivore', $herbivoresQty);
        $this->spawnEntitiesOnTheMap($map, 'grass', 15);
        $this->spawnEntitiesOnTheMap($map, 'rock', 10);
    }

    public function initTest(Map $map)
    {
        $map->mapArr[4][1] = new Herbivore();
        $map->mapArr[4][1]->y = 4;
        $map->mapArr[4][1]->x = 1;
        $map->mapArr[6][5] = new Predator();
        $map->mapArr[6][5]->y = 6;
        $map->mapArr[6][5]->x = 5;
        $map->mapArr[8][5] = new Grass();
        $map->mapArr[8][5]->y = 8;
        $map->mapArr[8][5]->x = 5;
    }

    public function spawnEntitiesOnTheMap(Map $map, $type, $qty): bool
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
