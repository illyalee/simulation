<?php
class InitActions
{
    function setPiecesInMap (Map $map,array  $pieces) {
      //раставлю в ручную. исправить на цикл позже
       $map->mapArr[$pieces[0]->y][$pieces[0]->x] = $pieces[0];
       $map->mapArr[$pieces[1]->y][$pieces[1]->x] = $pieces[1];
        $map->mapArr[$pieces[2]->y][$pieces[2]->x] = $pieces[2];

    }
}
