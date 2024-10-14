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

    public function next_turn()
    {
        $this->render->showMap($this->map->mapArr);
//        for($i = 0; $i < 5; $i++)
//        {
//            $this->actions->turnActions->movePieceManually($this->map);
//            $this->render->showMap($this->map->mapArr);
//        }
        $this->actions->turnActions->moveAllCreatures($this->map);
        $this->render->showMap($this->map->mapArr);
    }

    public function start_simulation()
    {
        $this->next_turn();
    }
}
