<?php

namespace Src\Entities;

use Src\World\{Map, Coordinates};

require_once "Entity.php";

abstract class Creature extends Entity
{
    public int $health;

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

    public function getName()
    {
        return $this->name;
    }
}
