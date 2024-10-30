<?php

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

    public function getCreaturesCoords(): array
    {
        $creatureCoords = [];
        foreach ($this->mapArr as $row) {
            foreach ($row as $cell) {
                if ($cell instanceof Creature) {
                    $creatureCoords[] = ['y' => $cell->getY(), 'x' => $cell->getX()];
                }
            }
        }
        return $creatureCoords;
    }

    public function getCreature($y, $x): Creature|null
    {
        return $this->mapArr[$y][$x];
    }

    public function move_object($startY, $startX, $endY, $endX)
    {
        $obj = $this->mapArr[$startY][$startX];
        $obj->y = $endY;
        $obj->x = $endX;
        $this->mapArr[$endY][$endX] = $obj;
        $this->mapArr[$startY][$startX] = null;
    }
}
