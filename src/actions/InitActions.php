<?php

namespace Src\Actions;

use src\world\Map;

class InitActions

{
    function setPiecesInMap(Map $map, array $pieces)
    {
        //раставлю в ручную. исправить на цикл позже
        foreach ($pieces as $piece) {
            $map->mapArr[$piece->y][$piece->x] = $piece;
        }
    }
}
