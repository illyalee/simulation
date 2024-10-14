<?php
require_once "classes/creatures/Creature.php";

class Herbivore extends Creature
{
    public function __construct($name, $health, $power, $y, $x)
    {
        parent::__construct($name, $health,$power, $y, $x);
    }

    public function make_move(Map $map, $pathSearch)
    {

    }


    public function getName()
    {
        return $this->name;
    }
}
//nextMoveCoords = pathSearch(Map $map, $this->y, $this->x);
//$nextMoveCoords = $pathSearch;
//$obj = $map->mapArr[$this->y][$this->x];
//$map->mapArr[$this->y][$this->x] = null;
//$map->mapArr[$nextMoveCoords[0]][$nextMoveCoords[1]] = $obj;
//var_dump($map->mapArr[$nextMoveCoords[0]][$nextMoveCoords[1]]);