<?php

abstract class Creature
{
    public Int $y;
    public Int $x;
    public String $name;
    public Int $health;
    public function __construct($name,  $health, $y, $x)
    {
        $this->name = $name;
        $this->y = $y;
        $this->x = $x;
        $this->health = $health;
    }
    abstract public function make_move(Map $map, $pathSearch);

    abstract public function changePositionOnTheMap(Map $map);
    abstract public function validateMove(Map $map, $nextY, $nextX);
    public function getName()
    {
    }
}
