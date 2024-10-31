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


    public function getEntity($y, $x): Entity|null
    {
        return $this->mapArr[$y][$x];
    }

    public function moveCreature($startY, $startX, $endY, $endX)
    {
        $obj = $this->mapArr[$startY][$startX];
        $obj->y = $endY;
        $obj->x = $endX;
        $this->mapArr[$endY][$endX] = $obj;
        $this->mapArr[$startY][$startX] = null;
        return true;
    }

    public function getMap(): array
    {
        return $this->mapArr;
    }
}
