<?php

class Map
{
    public $map;
    public function __construct($animal)
    {
        $this->map = [[null, null, null, null, null, null, null, null], [null, null, null, null, null, null, null, null], [null, null, null, null, null, null, null, null], [null, null, null, null, null, null, null, null]];
        if ($animal) {
            $this->setAnimal($animal);
        }
    }
    public function getMap()
    {
        return $this->map;
    }
    private function setAnimal($animal)
    {
        $this->map[$animal->getCoordX()][$animal->getCoordY()] = $animal;
    }
}