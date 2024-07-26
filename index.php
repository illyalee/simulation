<?php

require_once "classes/Simulation.php";
require_once "classes/Render.php";
require_once "classes/Map.php";
require_once "classes/Herbivor.php";
require_once "classes/Actions.php";
$render = new Render();
$elephant = new Herbivor("elephant", "3", "4");
$actions = new Actions();
$map = new Map($elephant);
$simulation = new Simulation($map, $render, $actions);
$simulation->next_turn();
