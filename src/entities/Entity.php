<?php

namespace Src\Entities;

abstract class Entity
{
    private int $y;
    private int $x;

    public function getY(): int
    {
        return $this->y;
    }

    public function updateCoords($newY, $newX): void
    {
        $this->y = $newY;
        $this->x = $newX;
    }

    public function getX(): int
    {
        return $this->x;
    }
}