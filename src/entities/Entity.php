<?php

namespace Src\Entities;

abstract class Entity
{
    public int $y;
    public int $x;

    public function getY()
    {
        return $this->y;
    }

    public function updateCoords($newY, $newX): void
    {
        $this->y = $newY;
        $this->x = $newX;
    }

    public function getX()
    {
        return $this->x;
    }
}