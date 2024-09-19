<?php

abstract class Creature
{
    public $name;
    public function __construct($name)
    {
        $this->$name = $name;
    }
    public function make_move()
    {

    }
    public function getName()
    {
    }
}
