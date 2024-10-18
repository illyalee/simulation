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

    public function move_object($startY, $startX, $endY, $endX)
    {

        $obj = $this->mapArr[$startY][$startX];
        $obj->y = $endY;
        $obj->x = $endX;
//        if ($obj instanceof Herbivore && $this->mapArr[$endY][$endX] instanceof Herbivore) {
//            echo 'MY BROTHER kill me(';
//            die;
//        }
        $this->mapArr[$endY][$endX] = $obj;
        $this->mapArr[$startY][$startX] = null;
    }
}
