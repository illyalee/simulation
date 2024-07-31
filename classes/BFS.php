<?php

class BFS
{
    public function start_search($map, $start_node_y, $start_node_x, $goal_node_y, $goal_node_x)
    {
        $newMap = $this->prepareCopyMap($map);
        $queue = [];
        array_push($queue, $newMap[$start_node_y][$start_node_x]);
        $numberOfIteration = 0;
        while (count($queue) !== 0) {
            $node = array_shift($queue);
            if ($node["coords"]['x'] == $goal_node_x & $node["coords"]['y'] == $goal_node_y) {
                echo "WIN: coords are:";
                if ($numberOfIteration == 1) {return ["y" => $node["coords"]['y'], "x" => $node['coords']['x']];} else {return $node['parent_coords'];};
            }
            $newMap[$node['coords']['y']][$node['coords']['x']]['visited'] = true;
            $childs_arr = $this->getChildsFromNode($newMap, $node);
            $numberOfIteration += 1;

            foreach ($childs_arr as $child) {
                if (is_null($child) || $child['visited'] == true) {
                    continue;
                }
                if ($numberOfIteration == 1) {
                    $child["parent_coords"]['x'] = $child['coords']['x'];
                    $child['parent_coords']['y'] = $child['coords']['y'];
                }
                if ($numberOfIteration > 1) {
                    $child["parent_coords"]['x'] = $node['parent_coords']['x'];
                    $child['parent_coords']['y'] = $node['parent_coords']['y'];
                }
                array_push($queue, $child);
            }
        }
        return false;
    }
    public function prepareCopyMap($map)
    {
        $newMap = [];
        for ($i = 0; $i <= count($map) - 1; $i++) {
            $row = [];
            for ($c = 0; $c <= count($map[$i]) - 1; $c++) {
                $cell = $map[$i][$c];
                $item = $cell instanceof Herbivor ? $cell : null;
                $y = $i;
                $x = $c;
                $coords = ['y' => $y, 'x' => $x];
                $visited = false;
                $parent_coords = ['y' => null, 'x' => null];
                $length_from_start_node = 0;
                $arr = [
                    'item' => $item,
                    'coords' => $coords,
                    'visited' => $visited,
                    'parent_coords' => $parent_coords,
                    'length_from_parent' => $length_from_start_node,
                ];
                array_push($row, $arr);
            }
            array_push($newMap, $row);
        }
        return $newMap;
    }
    public function getChildsFromNode($newMap, $node)
    {
        $newMapSizeY = count($newMap) - 1;
        $newMapSizeX = count($newMap[0]) - 1;

        $first = ($node['coords']['y'] + 1 >= 0 && $node['coords']['y'] + 1 <= $newMapSizeY) ? $newMap[$node['coords']['y'] + 1][$node['coords']['x']] : null;
        $second = ($node['coords']['y'] - 1 >= 0 && $node['coords']['y'] - 1 <= $newMapSizeY) ? $newMap[$node['coords']['y'] - 1][$node['coords']['x']] : null;
        $thirt = ($node['coords']['x'] + 1 >= 0 && $node['coords']['x'] + 1 <= $newMapSizeX) ? $newMap[$node['coords']['y']][$node['coords']['x'] + 1] : null;
        $fourth = ($node['coords']['x'] - 1 >= 0 && $node['coords']['x'] - 1 <= $newMapSizeX) ? $newMap[$node['coords']['y']][$node['coords']['x'] - 1] : null;
        return [$first, $second, $thirt, $fourth];
    }
}
