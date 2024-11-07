<?php

namespace Src\World;

use Src\Entities\{Creature, Entity, Grass, Herbivore};

class Coordinates
{
    private int $BORDER_OFFSET;

    public function __construct(int $map_length)
    {
        $this->BORDER_OFFSET = $map_length;
    }

    public function getAllCreaturesCoords(Map $map): array
    {
        $creatureCoords = [];
        foreach ($map->getMap() as $row) {
            foreach ($row as $cell) {
                if ($cell instanceof Creature) {
                    $creatureCoords[] = ['y' => $cell->getY(), 'x' => $cell->getX()];
                }
            }
        }
        return $creatureCoords;
    }

    public function getAllHerbivoresCoords(Map $map): array|false
    {
        $allCreaturesCoords = $this->getAllCreaturesCoords($map);
        if (empty($allCreaturesCoords)) {
            return false;
        }
        $herbivoreCoords = [];
        foreach ($allCreaturesCoords as $coords) {
            $entity = $map->getEntity($coords['y'], $coords['x']);
            if ($entity instanceof Herbivore) {
                $herbivoreCoords[] = $coords;
            }
        }
        return $herbivoreCoords;
    }

    public function getAllGrassCoords(Map $map): array
    {
        $grassCoords = [];
        foreach ($map->getMap() as $row) {
            foreach ($row as $cell) {
                if ($cell instanceof Grass) {
                    $grassCoords[] = ['y' => $cell->getY(), 'x' => $cell->getX()];
                }
            }
        }
        return $grassCoords;
    }

    public static function getFreeCellsCoords(Map $map): array
    {
        $mapArr = $map->getMap();
        $coords = [];
        for ($i = 0; $i < count($mapArr); $i++) {
            for ($j = 0; $j < count($mapArr[$i]); $j++) {
                $cell = $mapArr[$i][$j];
                if (!$cell instanceof Entity) {
                    $coords[] = ['y' => $i, 'x' => $j];
                }
            }
        }
        return $coords;
    }

    public function getCoordsInRangeByPoint($y, $x): array
    {
        $coordsInRange = [];
        $offsets = [
            [-1, 0],
            [1, 0],
            [0, -1],
            [0, 1],
            [-1, -1],
            [1, 1],
            [1, -1],
            [-1, 1],
        ];

        foreach ($offsets as [$dy, $dx]) {
            $newY = $y + $dy;
            $newX = $x + $dx;

            if ($this->isWithinBounds($newY, $newX)) {
                $coordsInRange[] = [$newY, $newX];
            }
        }

        return $coordsInRange;
    }

    private function isWithinBounds(int $y, int $x): bool
    {
        return $y >= 0 && $y < $this->BORDER_OFFSET && $x >= 0 && $x < $this->BORDER_OFFSET;
    }
}