<?php

class Render
{
    public $animal_icons = [
        "elephant" => "🐘",
    ];
    public function showMap($map)
    {
        foreach ($map as $row) {
            echo "\n";
            foreach ($row as $cell) {
                if ($cell instanceof Herbivor) {
                    echo " " . $this->animal_icons[$cell->getName()] . " ";

                    continue;
                }
                echo " .. ";
            }
        }
        echo "\n";
    }

}
