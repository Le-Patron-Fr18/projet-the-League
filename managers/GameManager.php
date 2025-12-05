<?php
class GameManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM games');
        $query->execute();
        $games = $query->fetchAll(PDO::FETCH_ASSOC);
        $games_return = [];
        foreach ($games as $i => $game)
        {
            $game_temp = new Game; 
            $game_temp->setId($game["id"]);
            $game_temp->setName($game["name"]);
            $game_temp->setDate($game["date"]);
            $game_temp->setTeam1($game["team_1"]);
            $game_temp->setTeam2($game["team_2"]);
            $game_temp->setWinner($game["winner"]);
            $games_return[] = $game_temp;
        }
        return $games_return;
    }
    public function findOne(int $id) : ?Game
    {
        $query = $this->db->prepare('SELECT * FROM games WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $game = $query->fetch(PDO::FETCH_ASSOC);
        $game_temp = new Game;
        if($game === null)
        {
            return null;
        }
        else
        {
            $game_temp->setId($game["id"]);
            $game_temp->setName($game["name"]);
            $game_temp->setDate($game["date"]);
            $game_temp->setTeam1($game["team_1"]);
            $game_temp->setTeam2($game["team_2"]);
            $game_temp->setWinner($game["winner"]);
            return $game_temp;
        }
    }
    public function findLastDate(int $id) : ?User
    {
        $query = $this->db->prepare('SELECT * FROM games ORDER BY date DESC LIMIT 1;');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $game = $query->fetch(PDO::FETCH_ASSOC);
        $game_temp = new Game;
        if($game === null)
        {
            return null;
        }
        else
        {
            $game_temp->setId($game["id"]);
            $game_temp->setName($game["name"]);
            $game_temp->setDate($game["date"]);
            $game_temp->setTeam1($game["team_1"]);
            $game_temp->setTeam2($game["team_2"]);
            $game_temp->setwinner($game["winner"]);
            return $game_temp;
        }
    }
}

