<?php
require_once "classes/Creature.php";
class Herbivor extends Creature
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
        $coords = $bfs->start_search($map, $this->y, $this->x, 'herbivor');
        var_dump($coords);
    }

    public function getName()
    {
        return $this->name;
    }
    public function getCoordX()
    {
        return $this->x;
    }
    public function getCoordY()
    {
        return $this->y;
    }
    public function setCoordX($x)
    {
        $this->x = $x;
    }
    public function setCoordY($y)
    {
        $this->y = $y;
    }
}
