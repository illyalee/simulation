<?php

require_once "classes/Simulation.php";
require_once "classes/Render.php";
require_once "classes/Map.php";
require_once "classes/Herbivor.php";
require_once "classes/Actions.php";
require_once "classes/InitActions.php";
require_once "classes/TurnActions.php";
require_once "classes/BFS.php";
require_once 'classes/Predator.php';
$render = new Render();
$elephant = new Herbivor("rabbit", "7", "10");
$wolf = new Predator('wolf', 1, 3);
$init_actions = new InitActions();
$bfs = new BFS();
$turn_actions = new TurnActions($bfs);
$actions = new Actions($init_actions, $turn_actions, $bfs);
$map = new Map();
$simulation = new Simulation($map, $render, $actions, [$elephant, $wolf]);

$simulation->start_simulation();
