<?php

namespace Src\World;

use Src\Actions\{Actions, InitActions, TurnActions};

class Simulation
{
    public Map $map;
    public Render $render;
    public Actions $actions;
    public Coordinates $coordinates;

    public function __construct(Map $map)
    {
        $this->map = $map;
        $this->render = new Render();
        $this->actions = new Actions();
        $this->coordinates = new Coordinates(count($this->map->getMap()));
        $wereCreaturesSpawn = $this->actions->initActions->initCreatures($this->map, 2, 6);
        if (!$wereCreaturesSpawn) {
            echo "cant spawn creatures, too much..";
            die;
        }
        $this->render->showMap($this->map->mapArr);
    }

    public function next_turn(): bool
    {
        $this->render->showMap($this->map->mapArr);
        sleep(1);
        return $this
            ->actions
            ->turnActions
            ->moveAllCreatures($this->map, $this->coordinates, $this->render);
    }

    public function start_simulation(): void
    {
        $continue = true;
        $counter = 0;
        while ($continue) {
            $continue = $this->next_turn();
        }
        $this->render->showMap($this->map->mapArr);
    }
}
