<?php

system('clear');

use Src\World\{Simulation, Map, Coordinates};

require __DIR__ . '/../src/autoload/autoload.php';
$map = new Map();
$simulation = new Simulation($map);
$simulation->start_simulation();