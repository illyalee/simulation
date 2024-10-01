<?php

class TurnActions
{
    public function __construct()
    {
    }

    public function getUserCoords()
    {
        $y = readline('Y: ');
        $x = readline('X: ');
        return [$y, $x];
    }

    public function movePieceManualy(Map $map)
    {
        //manual mova Object from one cell to another
        $start = $this->getUserCoords();
        $end = $this->getUserCoords();
        $mapArr = $map->getMap(); // copy of map array
        $element = $mapArr[$start[0]][$start[1]];
        $mapArr[$start[0]][$start[1]] = null;
        $mapArr[$end[0]][$end[1]] = $element;
        $map->setMap($mapArr); // replace old map with new map
    }
}
