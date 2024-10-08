<?php

abstract class Creature
{
    public Int $y;
    public Int $x;
    public String $name;
    public function __construct($name, $y, $x)
    {
        $this->name = $name;
        $this->y = $y;
        $this->x = $x;
    }
    abstract public function make_move(Map $map);

    abstract public function changePositionOnTheMap(Map $map);
    abstract public function validateMove();
    public function getName()
    {
    }
}
