<?php
require_once "classes/creatures/Creature.php";
class Herbivore extends Creature
{
    public String $name;
  public function __construct($name)
  {
      parent::__construct($name);
      $this->name = $name;
  }

    public function make_move(Map $map)
    {
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