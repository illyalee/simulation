<?php

class Simulation
{
    public Map $map;
    public Render $render;
    public Actions $actions;
    public function __construct($map, $render, $actions)
    {
        $this->map = $map;
        $this->render = $render;
        $this->actions = $actions;
    }
    public function next_turn()
    {
        $this->render->showMap($this->map->getMap());
    }
}
