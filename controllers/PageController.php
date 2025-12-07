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

        // Récupère tous les joueurs (ou mieux : ceux de la ligue) et leur équipe associée
        $rawPlayers = $playerMan->findAll();
        $players = [];
        if (!empty($rawPlayers) && is_iterable($rawPlayers)) {
            foreach ($rawPlayers as $p) {
                $team = null;
                try {
                    $team = $teamMan->findOne($p->getTeam());
                } catch (Throwable $e) {
                    $team = null;
                }
                $players[] = [
                    'player' => $p,
                    'team' => $team,
                ];
            }
        }

        $data = [
            "players" => $players,
            "team" => $teamMan->findOne(1),
        ];
        $this->render("playerS", $data);
    }
    
    public function teamS() : void
    {
    }

    public function team() : void
    {
    }

    public function matchS() : void
    {
    }

    public function match() : void
    {
    }
}