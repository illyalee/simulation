<?php

class Map
{
    public $map;
    public function __construct($animal)
    {
        $this->map = [[null, null, $animal, null, null, null, null, null], [null, null, null, null, null, null, null, null], [null, null, null, null, null, null, null, null], [null, null, null, null, null, null, null, null]];
    }
    public function getMap()
    {
        return $this->map;
    }
    public function setMap($map)
    {
        $this->map = $map;
    }

}
