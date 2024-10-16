<?php
require_once 'Node.php';
require_once 'Queue.php';

class PathSearch
{
    public function search($start_coords, Map $map)
    {
        $queue = new Queue();
        $nodes = $this->initNodes($map);
        $start_node = $nodes[$start_coords[0]][$start_coords[1]];
        $start_node->visited = true;
        $start_node->come_from = 'start_node';
        $queue->push($start_node);
        $start_node_class = get_class($nodes[$start_coords[0]][$start_coords[1]]->content);
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
        }
        return false;
    }

    private function initNodes(Map $map): array
    {
        $nodesArr = [];
        for ($i = 0; $i < count($map->mapArr); $i++) {
            $row = [];
            for ($j = 0; $j < count($map->mapArr[$i]); $j++) {
                $cell = $map->mapArr[$i][$j];
                if ($cell instanceof Creature) {
                    $node = new Node($i, $j, $cell);
                    $row[] = $node;
                    continue;
                }
                $row[] = new Node($i, $j, $cell);
            }
            $nodesArr[] = $row;
        }
        $this->addChildNodes($nodesArr);
        return $nodesArr;
    }

    private function addChildNodes($nodesArr): void
    {
        $mapWidth = count($nodesArr[0]);
        $mapHeight = count($nodesArr);
        for ($y = 0; $y < $mapHeight; $y++) {
            for ($x = 0; $x < $mapWidth; $x++) {
                $node = $nodesArr[$y][$x];
                $leftSideChild = ($x - 1) >= 0 ? $nodesArr[$y][$x - 1] : null;
                $rightSideChild = ($x + 1) < $mapWidth ? $nodesArr[$y][$x + 1] : null;
                $upSideChild = ($y - 1) >= 0 ? $nodesArr[$y - 1][$x] : null;
                $downSideChild = ($y + 1) < $mapWidth ? $nodesArr[$y + 1][$x] : null;
                foreach ([$leftSideChild, $rightSideChild, $upSideChild, $downSideChild] as $child) {
                    if ($child == null) continue;
                    $node->child_nodes[] = $child;
                    if ($child->content instanceof Rock) {
                        echo 'Rock';

                        $child->visited = true;

                    }
                }
            }
        }
    }
}