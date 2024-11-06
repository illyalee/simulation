<?php

namespace Src\World;

use Src\Actions\{Actions, InitActions, TurnActions};

class Simulation
{
    public Map $map;
    public Render $render;
    public Actions $actions;
    public Coordinates $coordinates;
    public int $counter;

    public function __construct(Map $map)
    {
        $this->map = $map;
        $this->render = new Render();
        $this->actions = new Actions();
        $this->coordinates = new Coordinates(count($this->map->getMap()));
        $this->counter = 0;
        $wereCreaturesSpawn = $this->actions->initActions->initCreatures($this->map, 2, 4);
    }

    public function next_turn(): void
    {
        sleep(1);
        $this->render->showMap($this->map->mapArr);
        $this->actions->turnActions->moveAllCreatures($this->map, $this->coordinates, $this->render);
        $isHerbivoresAlive = $this->actions->turnActions->isHerbivoresAlive($this->map, $this->coordinates);
        if ($isHerbivoresAlive === false) {
            $this->actions->initActions->spawnEntitiesOnTheMap($this->map, 'herbivore', 3);
        }
        $isEnoughGrass = $this->actions->turnActions->isEnoughGrass($this->map, $this->coordinates);
        if ($isEnoughGrass === false) {
            $this->actions->initActions->spawnEntitiesOnTheMap($this->map, 'grass', 3);
        }
    }

    public function start_simulation(): void
    {
        $continue = true;
        while ($continue) {
            $this->next_turn();
            $this->counter++;
            $continue = !($this->counter > 100);
        }
        $this->render->showMap($this->map->mapArr);
    }
}
