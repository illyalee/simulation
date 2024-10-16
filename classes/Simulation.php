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
        $wolf = $this->map->mapArr[0][0];
        $this->render->showMap($this->map->mapArr);
        sleep(1);
        $wolf->make_move($this->map);
        sleep(1);

        $this->render->showMap($this->map->mapArr);
        sleep(1);

        $wolf->make_move($this->map);
        $this->render->showMap($this->map->mapArr);
        $wolf->make_move($this->map);
        $this->render->showMap($this->map->mapArr);
        $wolf->make_move($this->map);
        $this->render->showMap($this->map->mapArr);
        $wolf->make_move($this->map);
        $this->render->showMap($this->map->mapArr);
        $wolf->make_move($this->map);
//        $this->actions->turnActions->moveAllCreatures($this->map);
//        $this->render->showMap($this->map->mapArr);
//        $this->actions->turnActions->moveAllCreatures($this->map);
//        $this->render->showMap($this->map->mapArr);
    }

    public function start_simulation()
    {
        $this->next_turn();
    }
}
