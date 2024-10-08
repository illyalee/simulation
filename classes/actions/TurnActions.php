<?php

class TurnActions
{
    public function __construct()
    {
    }
public function moveAllCreatures(Map $map): void
{
    //мы работает с копией карты
    for ($i = 0; $i < count($map->mapArr); $i++) {
        for ($j = 0; $j < count($map->mapArr[$i]); $j++) {
            $cell = $map->mapArr[$i][$j];
            if ($cell instanceof Creature) {
                echo 'cell start';
                echo 'var_dump ';
                var_dump($cell);
                echo 'var_dump  end';
                $cell->make_move($map);
                echo 'cell end';
                // После перемещения обновляем массив карты
//                $map->mapArr[$i][$j] = null;  // Удаляем объект после его хода
            }
        }
    }
}
    public function getUserCoords()
    {
        $y = readline('Y: ');
        $x = readline('X: ');
        return [$y, $x];
    }

    public function movePieceManually(Map $map)
    {
        //manual move Object from one cell to another
        $start = $this->getUserCoords();
        $end = $this->getUserCoords();
        $obj = $map->mapArr[$start[0]][$start[1]];
        $map->mapArr[$start[0]][$start[1]] = null;
        $map->mapArr[$end[0]][$end[1]] = $obj;
    }
}
