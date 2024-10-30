<?php

class TurnActions
{
    public function moveAllCreatures(Map $map, $render): bool
    {
        foreach ($map->mapArr as $row) {
            foreach ($row as $cell) {
                if ($cell instanceof Predator || $cell instanceof Herbivore) {
                    $isAlive = $this->isCreatureAlive($cell, $map);
                    if ($isAlive) {
                        $cell->make_move($map);
//                        $render->showMap($map->mapArr);
                        sleep(1);
                    }
                }
            }
        }
        return $this->isHerbivoresAlive($map);
    }

    private function isCreatureAlive($cell, $map): null|Creature
    {
        return $map->getObject($cell->y, $cell->x);
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
