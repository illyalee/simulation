<?php

abstract class Creature
{
    public $name;
    public function __construct($name)
    {
        $this->$name = $name;
    }
    public function make_move($map, BFS $bfs)
    {

    }
    public function getName()
    {
    }
}
