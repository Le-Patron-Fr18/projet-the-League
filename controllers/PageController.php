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
            "players" => $playerMan->findAllFromTeam(1),
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

    public function player() : void
    {
        $playerperformancesMan = new PlayerManager;
        $data = [
            "players" => $playerperformancesMan->findAllFromTeam(1),
            "performances" => [
                "playerperformances" => $playerperformances = $playerperformancesMan->findAll(),
                "points" => $points = $playerperformancesMan->findOne(1),
                "assists" => $assists = $playerperformancesMan->findOne(1),
            ],
        ];
        $this->render("player", $data);
    }

    public function playerS() : void
    {
        $teamMan = new TeamManager;
        $playerMan = new PlayerManager;

        $data = [
            "team" => $teamMan->findOne(1),
            "players" => $playerMan->findAllFromTeam(1),
            "playerlist" => [
                "nickname" => $nickname = $playerMan->findOne(1),
                "team" => $team = $teamMan->findOne($nickname->getTeam()),
                "name" => $name = $team->getName(),
                
                
            ],
        ];
        $this->render("playerS", $data);
    }
    
    public function teamS() : void
    {
        $data = [

        ];
        $this->render("teamS", $data);
    }

    public function team() : void
    {
        $data = [

        ];
        $this->render("team", $data);
    }

    public function matchS() : void
    {
        $data = [

        ];
        $this->render("matchS", $data);
    }

    public function match() : void
    {
        $data = [

        ];
        $this->render("match", $data);
    }
}