<?php

namespace Src\Entities;

class EntitiesFactory
{
    public static function create($className)
    {
        switch ($className) {
            case 'predator':
                return new Predator();
                break;
            case 'herbivore':
                return new Herbivore();
                break;
            case 'grass':
                return new Grass();
                break;
            case 'rock':
                return new Rock();
                break;
        }
    }
}