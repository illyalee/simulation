<?php

namespace Src\World;

use Src\Entities\Entity;

class Map
{
    public array $mapArr = [];

    public function __construct(int $columns = 10, int $rows = 10)
    {
        $this->createWorldMap($columns, $rows);
    }

    private function createWorldMap(int $columns, int $rows): void
    {
        for ($i = 0; $i < $columns; $i++) {
            $row = [];
            for ($j = 0; $j < $rows; $j++) {
                $row[] = null;
            }
            $this->mapArr[] = $row;
        }
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
