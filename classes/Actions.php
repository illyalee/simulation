<?php
class Actions
{
    public InitActions $init_actions;
    public TurnActions $turn_actions;
    public BFS $bfs;
    public function __construct($init_actions, $turn_actions, $bfs)
    {
        $this->init_actions = $init_actions;
        $this->turn_actions = $turn_actions;
        $this->bfs = $bfs;
    }
}
