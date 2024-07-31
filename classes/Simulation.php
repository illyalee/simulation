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
// просимулировать и отрендерить один ход
        $this->render->showMap($this->map->getMap());
        $this->actions->turn_actions->move_piece_manualy($this->map, 0, 2, 1, 1);
        $this->render->showMap($this->map->getMap());
    }
    public function start_simulation()
    {
//- запустить бесконечный цикл симуляции и рендерингаa
    }
    public function pause_simulation()
    {
        //    - приостановить бесконечный цикл симуляции и рендеринга
    }
}