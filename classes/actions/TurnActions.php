<?php

class TurnActions
{
    public function moveAllCreatures(Map $map, Coordinates $coordinates, $render): bool
    {
        $creaturesCoords = $coordinates->getAllCreaturesCoords($map);
        foreach ($creaturesCoords as $creatureCoords) {
            $entity = $map->getEntity($creatureCoords['y'], $creatureCoords['x']);
            if ($entity instanceof Creature) {
                $entity?->makeMove($map, $coordinates);
                $render->showMap($map->mapArr);
                sleep(1);
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
