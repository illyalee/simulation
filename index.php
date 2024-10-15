<?php require_once "classes/Simulation.php";
require_once "classes/Render.php";
require_once "classes/Map.php";
require_once "classes/creatures/Herbivore.php";
require_once "classes/actions/Actions.php";
require_once "classes/actions/InitActions.php";
require_once "classes/actions/TurnActions.php";
// require_once "classes/BFS.php";
require_once 'classes/creatures/Predator.php';
$render = new Render();
$rabbit = new Herbivore("rabbit", 5, 1, 3, 3);
$rabbit2 = new Herbivore("rabbit", 5, 1, 3, 2);
$wolf = new Predator('wolf', 10, 6, 0, 0);
$init_actions = new InitActions();
$turn_actions = new TurnActions();
$actions = new Actions($init_actions, $turn_actions);
$map = new Map();
$simulation = new Simulation($map, $render, $actions, [$rabbit, $wolf, $rabbit2]);


$simulation->start_simulation();
