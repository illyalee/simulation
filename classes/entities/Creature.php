<?php
require_once "Entity.php";

abstract class Creature extends Entity
{

    public string $name;
    public int $health;

    public function __construct(int $y, int $x, $name, $health)
    {
        parent::__construct($y, $x);
        $this->name = $name;
        $this->health = $health;
    }

    private function attack($pray, Map $map)
    {

    }

    abstract public function make_move(Map $map, Coordinates $coordinates);

    public function getName()
    {
    }
}
