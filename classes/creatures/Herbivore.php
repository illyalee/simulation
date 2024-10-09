<?php
require_once "classes/creatures/Creature.php";

class Herbivore extends Creature
{
    public function __construct($name, $health, $y, $x)
    {
        parent::__construct($name, $health, $y, $x);
    }

    public function make_move(Map $map, $pathSearch)
    {
        //nextMoveCoords = pathSearch(Map $map, $this->y, $this->x);
        $nextMoveCoords = [1, 2];
        $obj = $map->mapArr[$this->y][$this->x];
        $map->mapArr[$this->y][$this->x] = null;
        $map->mapArr[$nextMoveCoords[0]][$nextMoveCoords[1]] = $obj;
        var_dump($map->mapArr[$nextMoveCoords[0]][$nextMoveCoords[1]]);
    }

    public function changePositionOnTheMap(Map $map)
    {
        // TODO: Implement changePositionOnTheMap() method.
    }

    public function validateMove(Map $map, $nextY, $nextX)
    {
        // TODO: Implement validateMove() method.
    }

    public function getName()
    {
        return $this->name;
    }
}