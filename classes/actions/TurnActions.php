<?php

class TurnActions
{
    public function moveAllCreatures(Map $map, $render): bool
    {
        //foreach($arr as $k => $v) {
        //    if(key($v) > 5) {
        //        unset($arr[$k]);
        //    }
        //}

        foreach ($map->mapArr as $row) {
            foreach ($row as $cell) {
                if ($cell instanceof Predator || $cell instanceof Herbivore) {
                    $cell->make_move($map);
                    $render->showMap($map->mapArr);
                    sleep(1);
                }
            }
        }
        return $this->isHerbivoresAlive($map);
    }

    private function isHerbivoresAlive(Map $map): bool
    {
        foreach ($map->mapArr as $row) {
            foreach ($row as $cell) {
                if ($cell instanceof Herbivore) {
                    return true;
                }
            }
        }
        return false;
    }
}
