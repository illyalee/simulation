<?php
class InitActions
{
    public function init_actions(Map $map, $animals)
    {
        foreach ($animals as $animal) {
            $map->setObject($animal, $animal->getCoordY(), $animal->getCoordX());
        }
    }
}
