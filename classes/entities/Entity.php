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
}