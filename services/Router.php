<?php

class Router
{
    public function handleRequest(array $get) : void 
    {
        $ctrl = new PageController;

        if(isset($get['route']))
        {
            if($get['route'] === "home")
            {
                $ctrl->home();
            }
            elseif($get['route'] === "teams")
            {
                $ctrl->teamS();
            }
            elseif($get['route'] === "team")
            {
                $ctrl->team();
            }
            elseif($get['route'] === "players")
            {
                $ctrl->playerS();
            }
            elseif($get['route'] === "player")
            {
                $ctrl->player();
            }
            elseif($get['route'] === "matchs")
            {
                $ctrl->matchS();
            }
            elseif($get['route'] === "match")
            {
                $ctrl->match();
            }
            else
            {
                $ctrl->notFound();
            }
        }
        else 
        {
            $ctrl->home();
        }
    }
}