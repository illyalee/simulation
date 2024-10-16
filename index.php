<?php require_once "classes/Simulation.php";
require_once "classes/Render.php";
require_once "classes/Map.php";
require_once "classes/entities/Herbivore.php";
require_once "classes/actions/Actions.php";
require_once "classes/actions/InitActions.php";
require_once "classes/actions/TurnActions.php";
// require_once "classes/BFS.php";
require_once 'classes/entities/Predator.php';
require_once "classes/entities/Rock.php";
$render = new Render();
$rabbit = new Herbivore(7, 0, "rabbit", 5, 1);
$rabbit2 = new Herbivore(7, 8, "rabbit", 5, 1);
$wolf = new Predator(9, 8, 'wolf', 10, 6);
$rock1 = new Rock(8, 6);
$rock2 = new Rock(8, 7);
$rock3 = new Rock(8, 8);
$init_actions = new InitActions();
$turn_actions = new TurnActions();
$actions = new Actions($init_actions, $turn_actions);
$map = new Map();
$simulation = new Simulation($map, $render, $actions, [$rabbit, $wolf, $rabbit2, $rock1, $rock2, $rock3]);


$simulation->start_simulation();
