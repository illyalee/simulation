<?php

namespace Src\Actions;

class Actions
{
    public InitActions $initActions;
    public TurnActions $turnActions;

    public function __construct()
    {
        $this->initActions = new InitActions();
        $this->turnActions = new TurnActions();
    }
}
