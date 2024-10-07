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
        for($i = 0; $i < 5; $i++)
        {
            $this->actions->turnActions->movePieceManualy($this->map);
            $this->render->showMap($this->map->getMap());
        }
        }
    public function start_simulation()
    {
        $this->next_turn();
    }
}
