<?php

class Node
{
    public object|null $content;
    public bool $visited = false;
    public object|null $parent = null;
    public string $y;
    public string $x;
    public array $child_nodes = [];
    public Node|null|string $come_from = null;

    public function __construct($y, $x, $content = null)
    {
        $this->y = $y;
        $this->x = $x;
        $this->content = $content;
    }
}