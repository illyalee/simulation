<?php
require_once "Entity.php";

abstract class Creature extends Entity
{

    public string $name;
    public int $health;
    public int $power;

    public function __construct(int $y, int $x, $name, $health, $power)
    {
        parent::__construct($y, $x);
        $this->name = $name;
        $this->health = $health;
        $this->power = $power;
    }

    public function getCreatureAround($y, $x, Map $map)
    {

    }

    public function attack($pray, Map $map)
    {

    }

    abstract public function make_move(Map $map);

    public function getName()
    {
    }
}
