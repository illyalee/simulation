<?php

require_once "classes/Simulation.php";
require_once "classes/Render.php";
require_once "classes/Map.php";
require_once "classes/Herbivor.php";
require_once "classes/Actions.php";
require_once "classes/InitActions.php";
require_once "classes/TurnActions.php";
require_once "classes/BFS.php";
$render = new Render();
$elephant = new Herbivor("elephant", "3", "4");
$init_actions = new InitActions();
$turn_actions = new TurnActions();
$bfs = new BFS();
$actions = new Actions($init_actions, $turn_actions, $bfs);
$map = new Map($elephant);
$simulation = new Simulation($map, $render, $actions);
$simulation->next_turn();
