<?php

abstract class Creature
{
    public int $y;
    public int $x;
    public string $name;
    public int $health;
    public int $power;

    public function __construct($name, $health, $power, $y, $x)
    {
        $this->name = $name;
        $this->y = $y;
        $this->x = $x;
        $this->health = $health;
        $this->power = $power;
    }
public function getCreatureAround($y, $x, Map $map) {

}
    public function attack($pray, Map $map) {

    }
    abstract public function make_move(Map $map, $pathSearch);

    public function getName()
    {
    }
}
