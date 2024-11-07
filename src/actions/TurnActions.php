<?php

namespace Src\Actions;

use Src\World\{Map, Coordinates};
use src\Entities\{Creature};

class TurnActions
{
    public function moveAllCreatures(Map $map, Coordinates $coordinates): void
    {
        $creaturesCoords = $coordinates->getAllCreaturesCoords($map);
        foreach ($creaturesCoords as $creatureCoords) {
            $entity = $map->getEntity($creatureCoords['y'], $creatureCoords['x']);
            if ($entity instanceof Creature) {
                $entity->makeMove($map, $coordinates);
            }
        }
    }

    public function isHerbivoresAlive(Map $map, Coordinates $coordinates): bool
    {
        $herbivoresCoords = $coordinates->getAllHerbivoresCoords($map);
        if (empty($herbivoresCoords)) {
            return false;
        }
        return true;
    }

    public function isEnoughGrass(Map $map, Coordinates $coordinates): bool
    {
        $grassCoords = $coordinates->getAllGrassCoords($map);
        if (empty($grassCoords) || count($grassCoords) < 2) {
            return false;
        }
        return true;
    }
}
