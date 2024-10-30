<?php

abstract class Entity
{
    public int $y;
    public int $x;

    public function __construct(int $y, int $x)
    {
        $this->y = $y;
        $this->x = $x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function getX()
    {
        return $this->x;
    }
}