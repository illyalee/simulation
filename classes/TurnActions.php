<?php

class TurnActions
{
    public function move_piece_manualy(Map $mapClass, $y, $x, $y2, $x2)
    {$map = $mapClass->getMap();
        $animal = $this->getAnimal($map, $y, $x);
        $animal->setCoordX($x2);
        $animal->setCoordY($y2);
        $map = $this->unmountAnimal($map, $y, $x);
        $map = $this->setAnimal($map, $animal);
        $mapClass->setMap($map);}
    public function setAnimal($map, $animal)
    {
        $map[$animal->getCoordY()][$animal->getCoordX()] = $animal;
        return $map;
    }
    public function move_piece()
    {

    }
    public function getAnimal($map, $y, $x)
    {
        if ($map[$y][$x] instanceof Herbivor) {
            return $map[$y][$x];
        }
    }
    public function unmountAnimal($map, $y, $x)
    {
        $map[$y][$x] = null;
        return $map;
    }
}
