<?php

class TurnActions
{
    public function moveAllCreatures(Map $map, $render): bool
    {
        $creaturesCoords = $map->getCreaturesCoords();

        foreach ($creaturesCoords as $creatureCoords) {
            $creature = $map->getCreature($creatureCoords['y'], $creatureCoords['x']);
            $creature?->make_move($map);
//            $render->showMap($map->mapArr);
//            sleep(1);
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
