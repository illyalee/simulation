<?php

namespace Src\Search;

use Src\World\{Map, Coordinates};
use Src\Search\{Node, Queue};
use Src\Entities\{Creature, Entity, Predator, Grass, Rock, Herbivore};

require_once 'Node.php';
require_once 'Queue.php';

class PathSearch
{
    public function findPath($start_coords, Map $map)
    {
        echo "in Patch Search";
        $start_node_class = str_replace(
            'Src\\Entities\\',
            "",
            get_class($map->mapArr[$start_coords[0]][$start_coords[1]])
        );
        var_dump($start_node_class);
        $queue = new Queue();
        $nodes = $this->initNodes($map, $start_node_class);
        $start_node = $nodes[$start_coords[0]][$start_coords[1]];
        $start_node->visited = true;
        $start_node->come_from = 'start_node';
        $queue->push($start_node);
        while (!$queue->isEmpty()) {
            $node = $queue->pop();
            if ($this->isGoalNode($node, $start_node_class)) {
                return $this->getCoordsList($node);
            }
            foreach ($node->child_nodes as $child) {
                if (!$child->visited) {
                    $child->visited = true;
                    $child->come_from = $node;
                    $queue->push($child);
                }
            }
        }
    }

    private function getCoordsList(Node $node): array
    {
        $coords = array();
        $coords[] = ['y' => $node->y, 'x' => $node->x];
        while ($node->come_from !== 'start_node') {
            $coords[] = ['y' => $node->come_from->y, 'x' => $node->come_from->x];
            $node = $node->come_from;
        }
        return array_reverse($coords);
    }

    private function isGoalNode(Node $node, $start_node_class): bool
    {
        if ($start_node_class == 'Predator' && $node->content instanceof Herbivore) {
            return true;
        } else {
            if ($start_node_class == 'Herbivore' && $node->content instanceof Grass) {
                return true;
            }
        }
        return false;
    }

    private function initNodes(Map $map, $start_node_class): array
    {
        $nodesArr = [];
        for ($i = 0; $i < count($map->mapArr); $i++) {
            $row = [];
            for ($j = 0; $j < count($map->mapArr[$i]); $j++) {
                $cell = $map->mapArr[$i][$j];
                if ($cell instanceof Entity) {
                    $node = new Node($i, $j, $cell);
                    $row[] = $node;
                    continue;
                }
                $row[] = new Node($i, $j, $cell);
            }
            $nodesArr[] = $row;
        }
        $this->addChildNodes($nodesArr, $start_node_class);
        return $nodesArr;
    }

    private function addChildNodes($nodesArr, $start_node_class): void
    {
        $mapWidth = count($nodesArr[0]);
        $mapHeight = count($nodesArr);
        for ($y = 0; $y < $mapHeight; $y++) {
            for ($x = 0; $x < $mapWidth; $x++) {
                $currentNode = $nodesArr[$y][$x];
                $leftSideChild = ($x - 1) >= 0 ? $nodesArr[$y][$x - 1] : null;
                $rightSideChild = ($x + 1) < $mapWidth ? $nodesArr[$y][$x + 1] : null;
                $upSideChild = ($y - 1) >= 0 ? $nodesArr[$y - 1][$x] : null;
                $downSideChild = ($y + 1) < $mapWidth ? $nodesArr[$y + 1][$x] : null;
                foreach ([$leftSideChild, $rightSideChild, $upSideChild, $downSideChild] as $childNode) {
                    //$childNode == null, то есть за пределами карты
                    if ($childNode == null) {
                        continue;
                    }
                    $currentNode->child_nodes[] = $childNode;
                    if ($childNode->content instanceof Rock) {
                        $childNode->visited = true;
                    }
                    if (($childNode->content instanceof Grass || $childNode->content instanceof Predator) && $start_node_class == "Predator") {
                        $childNode->visited = true;
                    }
                    if (($childNode->content instanceof Herbivore || $childNode->content instanceof Predator) && $start_node_class == "Herbivore") {
                        $childNode->visited = true;
                    }
                }
            }
        }
    }
}