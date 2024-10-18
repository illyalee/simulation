<?php

class Simulation
{
    public Map $map;
    public Render $render;
    public Actions $actions;

    public function __construct($map, $render, $actions, $animals)
    {
        $this->map = $map;
        $this->render = $render;
        $this->actions = $actions;
        $this->actions->initActions->setPiecesInMap($map, $animals);
    }

    public function next_turn(): bool
    {
        $this->render->showMap($this->map->mapArr);
        return $this->actions->turnActions->moveAllCreatures($this->map, $this->render);
//        $this->actions->turnActions->moveAllCreatures($this->map);
//        $this->render->showMap($this->map->mapArr);
    }

    public function start_simulation()
    {
        $continue = true;
        while ($continue) {
            $continue = $this->next_turn();
        }
        $this->render->showMap($this->map->mapArr);
    }
}
