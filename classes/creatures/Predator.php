<?php

require_once "classes/creatures/Creature.php";
class Predator extends Creature
{
    public function __construct($name, $y, $x)
    {
        parent::__construct($name, $y, $x);
    }    public function make_move(Map $map)
    {
       //существо получило координаты след хода
       //через поиск пути
       // поиск пути отдает только координаты след точки, он не проверяет ести ли там жертва
       //пока использую готовые координаты
//       $nextMoveCoords = [3,4];
       //дале мы проверяем можно ли сделать ход, атаковать расплодиться
       //существо изменило положение на карте
//        $obj = $map->mapArr[$this->y][$this->x];
//        $map->mapArr[$this->y][$this->x] = null;
//        $map->mapArr[$nextMoveCoords[0]][$nextMoveCoords[1]] = $obj;
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
