<?php

namespace Src\Search;

class Queue
{
    private array $queue = [];

    public function pop(): ?Node
    {
        return array_shift($this->queue);
    }

    public function push(Node $item): void
    {
        $this->queue[] = $item;
    }

    public function isEmpty(): bool
    {
        if (!$this->queue) {
            return true;
        }
        return false;
    }
}