<?php
require_once "classes/creatures/Creature.php";
class Herbivore extends Creature
{
    public function __construct($name, $y, $x)
    {
        parent::__construct($name, $y, $x);
    }

    public function make_move(Map $map)
    {
        $nextMoveCoords = [1, 2];
        $obj = $map->mapArr[$this->y][$this->x];
        $map->mapArr[$this->y][$this->x] = null;
        $map->mapArr[$nextMoveCoords[0]][$nextMoveCoords[1]] = $obj;
        var_dump( $map->mapArr[$nextMoveCoords[0]][$nextMoveCoords[1]]);
    }
    public function changePositionOnTheMap(Map $map)
    {
        // TODO: Implement changePositionOnTheMap() method.
    }

    public function validateMove()
{
    // TODO: Implement validateMove() method.
}

    public function getName()
    {
        return $this->name;
    }
}