<?php

class InitActions
{
    function setPiecesInMap(Map $map, array $pieces)
    {
        //раставлю в ручную. исправить на цикл позже

        $map->mapArr[$pieces[0]->y][$pieces[0]->x] = $pieces[0];
        $map->mapArr[$pieces[1]->y][$pieces[1]->x] = $pieces[1];
        $map->mapArr[$pieces[2]->y][$pieces[2]->x] = $pieces[2];
        $map->mapArr[$pieces[3]->y][$pieces[3]->x] = $pieces[3];
        $map->mapArr[$pieces[4]->y][$pieces[4]->x] = $pieces[4];
        $map->mapArr[$pieces[5]->y][$pieces[5]->x] = $pieces[5];
        $map->mapArr[$pieces[6]->y][$pieces[6]->x] = $pieces[6];
    }
}
