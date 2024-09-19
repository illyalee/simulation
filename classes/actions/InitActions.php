<?php
class InitActions
{
    function setPiecesInMap (Map $map,array  $pieces) {
      //раставлю в ручную. исправить на цикл позже
       $map->map[0][1] = $pieces[0];
    }
}
