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

    public function getHealth(): int
    {
        return $this->health;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    abstract public function makeMove(Map $map, Coordinates $coordinates);

    private function attack($pray, Map $map)
    {

    }

    public function updateCoords($newY, $newX)
    {
        $this->y = $newY;
        $this->x = $newX;
    }

    public function getName()
    {
    }
}
