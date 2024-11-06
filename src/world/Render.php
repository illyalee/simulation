<?php

namespace Src\World;

use Src\Entities\Entity;

class Render
{
    public array $animal_icons = [
        'src\entities\herbivore' => "🐇",
        'src\entities\predator' => '🐺',
        'src\entities\rock' => '🪨',
        'src\entities\grass' => '🌱'
    ];

    public function showMap($map)
    {
        system('clear');
        foreach ($map as $row) {
            echo "\n";
            foreach ($row as $cell) {
                if ($cell instanceof Entity) {
                    echo " " . $this->animal_icons[strtolower(get_class($cell))];
                    continue;
                }
                echo " 🟧";
            }
        }
        echo "\n";
    }
}