<?php

require_once "classes/creatures/Creature.php";
class Predator extends Creature
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function make_move()
    {

    }
    public function getName()
    {
        return $this->name;
    }
}
