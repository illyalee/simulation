<?php

require_once "classes/Creature.php";
require_once "classes/Creature.php";
class Predator extends Creature
{
    public $x;
    public $y;
    public $name;
    public function __construct($name, $y, $x)
    {
        $this->name = $name;
        $this->x = $x;
        $this->y = $y;
    }
    public function make_move($map, $bfs)
    {
        // $coords = $bfs->start_search($map, $this->y, $this->x, 'predator');
        // var_dump($coords);
        // $oldy = $this->y;
        // $oldx = $this->x;
        // $this->y = $bfs["y"];
        // $this->x = $bfs["x"];
        // $map[$oldy][$oldx] = null;
        return $map;
    }
    public function getCoordX()
    {
        return $this->x;
    }
    public function getCoordY()
    {
        return $this->y;
    }
    public function getName()
    {
        return $this->name;
    }
}
