<?php

class Render
{
    public $animal_icons = [
        "herbivore" => "🐇",
        "predator" => '🐺',
        "rock" => '🪨',
        "grass" => '🌱'
    ];

    public function showMap($map)
    {
        foreach ($map as $row) {
            echo "\n";
            foreach ($row as $cell) {
                if ($cell instanceof Entity) {
                    echo " " . $this->animal_icons[strtolower(get_class($cell))];
                    continue;
                }
                echo " 🟫";
            }
        }
        echo "\n";
    }
}