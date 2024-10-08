<?php

abstract class Creature
{
    public String $name;
    public function __construct($name)
    {
        $this->$name = $name;
    }
    abstract public function make_move(Map $map);

    abstract public function changePositionOnTheMap(Map $map);
    abstract public function validateMove();
    public function getName()
    {
    }
}
