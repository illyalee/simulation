<?php
class Actions
{
    public InitActions $initActions;
    public TurnActions $turnActions;
    public function __construct($initActions, $turnActions)
    {
        $this->initActions = $initActions;
        $this->turnActions = $turnActions;
    }
}
