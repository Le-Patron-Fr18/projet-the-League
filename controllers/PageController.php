<?php

class PageController extends AbstractController
{
    public function home() : void
    {
        $teamMan = new TeamManager;
        $playerMan = new PlayerManager;
        $gameMan = new GameManager;
        $data = [
            "team" => $teamMan->findOne(1),
            "players" => $playerMan->findAll(1),
            "highlighted" => [
                $playerMan->findOne(3),
                $playerMan->findOne(14),
                $playerMan->findOne(12),
            ],
            "lastMatch" => [
                "game" => $game = $gameMan -> findLastDate(),
                "team_1" => $team_1 = $teamMan->findOne($game->getTeam1()),
                "team_2" => $team_2 = $teamMan->findOne($game->getTeam2()),
                "winner" => $winner = $teamMan->findOne($game->getWinner())
            ],
        ];
        $this->render("home", $data);
    }
}