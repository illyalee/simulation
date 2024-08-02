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
        $this->actions->initActions->init_actions($this->map, $animals);
    }

    public function next_turn()
    {
        // $this->actions->turn_actions->move_piece($this->map, 0, 2, 1, 1);
        $this->render->showMap($this->map->getMap());
        $this->actions->turnActions->turn_actions($this->map);
        $this->render->showMap($this->map->getMap());
    }
    public function start_simulation()
    {
        $this->next_turn();
        // $this->render->showMap($this->map->getMap());
        // for ($i = 0; $i < 15; $i++) {
        //     sleep(1);
        //     $this->next_turn();
        //     $this->render->showMap($this->map->getMap());
        // }
    }
    public function pause_simulation()
    {
        //    - приостановить бесконечный цикл симуляции и рендеринга
    }
}
