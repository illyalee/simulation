<?php

class TurnActions
{
    public BFS $bfs;
    public function __construct($bfs)
    {
        $this->bfs = $bfs;
    }
    public function turn_actions(Map $map)
    {
        // foreach ($map->getMap() as $row) {
        //     foreach ($row as $cell) {
        //         if ($cell instanceof Predator) {
        //             $cell->make_move($map->getMap(), $this->bfs);
        //         }
        //         $map->changeObjectsPostion();
        //     }
        //

        $cell = $map->getMap()[1][3];
        $newmap = $cell->make_move($map->getMap(), ['x' => 4, 'y' => 1]);
        echo $newmap === $map->getMap();
        // // $map->map = $newmap;
        // $map->changeObjectsPostion();
    }

    public function move_piece_manualy(Map $mapClass, $y, $x, $y2, $x2)
    {
        $map = $mapClass->getMap();
        $animal = $this->getAnimal($map, $y, $x);
        $animal->setCoordX($x2);
        $animal->setCoordY($y2);
        $map = $this->unmountAnimal($map, $y, $x);
        $map = $this->setAnimal($map, $animal);
        // $mapClass->setMap($map);
    }
    public function setAnimal($map, $animal)
    {
        $map[$animal->getCoordY()][$animal->getCoordX()] = $animal;
        return $map;
    }
    public function move_piece($map, $y, $x, $y2, $x2)
    {
        $coords = $this->bfs->start_search($map->getMap(), $y, $x, $y2, $x2);
        $this->move_piece_manualy($map, $y, $x, $coords['y'], $coords['x']);
        return $coords;
    }
    public function getAnimal($map, $y, $x)
    {
        if ($map[$y][$x] instanceof Herbivor) {
            return $map[$y][$x];
        }
    }
    public function unmountAnimal($map, $y, $x)
    {
        $map[$y][$x] = null;
        return $map;
    }
}
