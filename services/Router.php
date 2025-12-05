<?php

class Routeur
{
    public function handleRequest(array $get) : void 
    {
        $ctrl = new UserController;

        if(isset($get['route']))
        {
            if($get['route'] === "home")
            {
                $ctrl->home();
            }
            elseif($get['route'] === "teams")
            {
                $ctrl->teams();
            }
            elseif($get['route'] === "players")
            {
                $ctrl->players();
            }
            elseif($get['route'] === "matchs")
            {
                $ctrl->matchs();
            }
        }
        else 
        {

        }
    }
}