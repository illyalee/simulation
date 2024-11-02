<?php

use Src\World\{Simulation, Map, Render, Coordinates};
use Src\Actions\{Actions, InitActions, TurnActions};
use Src\Entities\{Predator, Herbivore, Rock, Grass};

require_once "../src/world/Simulation.php";
require_once "../src/world/Render.php";
require_once "../src/world/Map.php";
require_once "../src/entities/Herbivore.php";
require_once "../src/actions/Actions.php";
require_once "../src/actions/InitActions.php";
require_once "../src/actions/TurnActions.php";
require_once '../src/entities/Predator.php';
require_once "../src/entities/Rock.php";
require_once "../src/entities/Grass.php";
require_once "../src/world/coordinates.php";
//spl_autoload_register(function ($class) {
//    require "../src/world/Simulation.php";
//});
$render = new Render();
$rabbit = new Herbivore(7, 0, "rabbit", 5, 1);
$rabbit2 = new Herbivore(7, 8, "rabbit", 5, 1);
$wolf = new Predator(9, 8, 'wolf', 10, 6);
$wolf2 = new Predator(2, 4, 'wolf', 10, 6);

$rock1 = new Rock(8, 6);
$rock2 = new Rock(8, 7);
$rock3 = new Rock(8, 8);
$grass = new Grass(3, 4);
$init_actions = new InitActions();
$turn_actions = new TurnActions();
$actions = new Actions($init_actions, $turn_actions);
$map = new Map();
$coordinates = new Coordinates(count($map->getMap()));
$simulation = new Simulation(
    $map,
    $render,
    $actions,
    $coordinates,
    [$rabbit, $wolf, $rabbit2, $rock1, $rock2, $rock3, $grass, $wolf2]
);
$simulation->start_simulation();
