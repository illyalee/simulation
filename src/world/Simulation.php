<?php

namespace Src\World;

use Src\Actions\{Actions, InitActions, TurnActions};

class Simulation
{
    private Map $map;
    private Render $render;
    private Actions $actions;
    private Coordinates $coordinates;
    private int $counter;

    public function __construct(Map $map)
    {
        $this->map = $map;
        $this->render = new Render();
        $this->actions = new Actions();
        $this->coordinates = new Coordinates(count($this->map->getMap()));
        $this->counter = 0;
        $this->actions->initActions->initCreatures($this->map, 2, 3);
    }

    public function next_turn(): void
    {
        sleep(1);
        $this->render->showMap($this->map);
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
        $iteration = readline("How many iterations would you want: (1 to ~)");
        $continue = true;
        while ($continue) {
            $this->next_turn();
            $this->counter++;
            $continue = !($this->counter > $iteration);
        }
        $this->render->showMap($this->map);
    }
}
