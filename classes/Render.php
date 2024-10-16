<?php

class Render
{
    public $animal_icons = [
        "rabbit" => "🐇",
        "wolf" => '🐺',
    ];

    public function showMap($map)
    {
        foreach ($map as $row) {
            echo "\n";
            foreach ($row as $cell) {
                if ($cell instanceof Creature) {
                    echo " " . $this->animal_icons[$cell->getName()];
                    continue;
                }
                echo " 🟫";
            }
        }
        echo "\n";
    }

}