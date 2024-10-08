<?php

class Map
{
    public $map;

    public function __construct()
    {
        $this->map = [
            [null, null, null, null, null],
            [null, null, null, null, null],
            [null, null, null, null, null],
            [null, null, null, null, null]
        ];
    }

    public function getMap()
    {
        return $this->map;
    }

    public function setMap(array $map): void
    {
        $this->map = $map;
    }
}
