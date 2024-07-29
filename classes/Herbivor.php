<?php

class Herbivor
{
    public $x;
    public $y;
    public $name;
    public function __construct($name, $x, $y)
    {
        $this->name = $name;
        $this->x = $x;
        $this->y = $y;
    }
    public function make_move()
    {

    }
    public function getName()
    {
        return $this->name;
    }
    public function getCoordX()
    {
        return $this->x;
    }
    public function getCoordY()
    {
        return $this->y;
    }
    public function setCoordX($x)
    {
        $this->x = $x;
    }
    public function setCoordY($y)
    {
        $this->y = $y;
    }
}
