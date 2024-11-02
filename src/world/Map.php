<?php

namespace Src\World;

use Src\Entities\Entity;

class Map
{
    public array $mapArr;

    public function __construct()
    {
        $this->mapArr = [
            [null, null, null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null, null, null]
        ];
    }


    public function getEntity($y, $x): Entity|null
    {
        return $this->mapArr[$y][$x];
    }

    public function setEntity(Entity $entity, $pointY, $pointX): void
    {
        $this->mapArr[$pointY][$pointX] = $entity;
    }

    public function unsetEntity($pointY, $pointX): void
    {
        $this->mapArr[$pointY][$pointX] = null;
    }

    public function changeCreaturePosition($startY, $startX, $endY, $endX): void
    {
        echo "try to change position in Map";
        $creature = $this->getEntity($startY, $startX);
        $creature->updateCoords($endY, $endX);
        $this->setEntity($creature, $endY, $endX);
        $this->unsetEntity($startY, $startX);
    }

    public function getMap(): array
    {
        return $this->mapArr;
    }
}
