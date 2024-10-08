<?php

require_once "classes/creatures/Creature.php";
class Predator extends Creature
{
    public String $name;
    public function __construct($name)
    {
        parent::__construct($name);
        $this->name = $name;
    }

    public function make_move(Map $map)
    {
       //существо получило координаты след хода
       //через поиск пути
       // поиск пути отдает только координаты след точки, он не проверяет ести ли там жертва
       //пока использую готовые координаты
       $nextMoveCoords = [1, 2];
       //дале мы проверяем можно ли сделать ход, атаковать расплодиться
       //существо изменило положение на карте
       var_dump($nextMoveCoords);
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
