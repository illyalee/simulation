<?php

class TurnActions
{


    public function moveAllCreatures(Map $map): void
    {
        $map->mapArr[0][0]->make_move($map);

        //мы работает с копией карты
//        for ($i = 0; $i < count($map->mapArr); $i++) {
//            for ($j = 0; $j < count($map->mapArr[$i]); $j++) {
//                $cell = $map->mapArr[$i][$j];
//                if ($cell instanceof Creature) {
//                    $cell->make_move($map, $this->pathSearch);
//                }
//            }
//        }
    }
}
