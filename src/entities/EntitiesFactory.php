<?php

namespace Src\Entities;

class EntitiesFactory
{
    public static function create($className)
    {
        switch ($className) {
            case 'predator':
                return new Predator();
            case 'herbivore':
                return new Herbivore();
            case 'grass':
                return new Grass();
            case 'rock':
                return new Rock();
        }
    }
}