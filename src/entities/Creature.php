<?php

namespace Src\Entities;

use Src\World\{Map, Coordinates};

require_once "Entity.php";

abstract class Creature extends Entity
{
    private int $health = 3;

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
}
