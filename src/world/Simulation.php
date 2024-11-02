<?php

namespace Src\World;

use Src\Actions\Actions;

class Simulation
{
    public Map $map;
    public Render $render;
    public Actions $actions;
    public Coordinates $coordinates;

    public function __construct($map, $render, $actions, $coordinates, $animals)
    {
        $this->map = $map;
        $this->render = $render;
        $this->actions = $actions;
        $this->actions->initActions->setPiecesInMap($map, $animals);
        $this->coordinates = $coordinates;
    }

    public function next_turn(): bool
    {
        $this->render->showMap($this->map->mapArr);
        return $this->actions->turnActions->moveAllCreatures($this->map, $this->coordinates, $this->render);
    }

    public function start_simulation(): void
    {
        $continue = true;
        $counter = 0;
        while ($continue) {
            $continue = $this->next_turn();
//            $counter++;
//            if ($counter > 5) {
//            $continue = false;
//            }
        }
        $this->render->showMap($this->map->mapArr);
    }
}
