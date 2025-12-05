<?php
class GameManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM players');
        $query->execute();
        $players = $query->fetchAll(PDO::FETCH_ASSOC);
        $players_return = [];
        foreach ($players as $i => $player)
        {
            $player_temp = new Player; 
            $player_temp->setId($player["id"]);
            $player_temp->setNickname($player["Nickname"]);
            $player_temp->setBio($player["bio"]);
            $player_temp->setPortrait($player["portrait"]);
            $player_temp->setTeam($player["team"]);
            $players_return[] = $player_temp;
        }
        return $players_return;
    }
    public function findOne(int $id) : ?Player
    {
        $query = $this->db->prepare('SELECT * FROM players WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $player = $query->fetch(PDO::FETCH_ASSOC);
        $player_temp = new Player;
        if($player === null)
        {
            return null;
        }
        else
        {
            $player_temp->setId($player["id"]);
            $player_temp->setNickname($player["Nickname"]);
            $player_temp->setBio($player["bio"]);
            $player_temp->setPortrait($player["portrait"]);
            $player_temp->setTeam($player["team"]);
            return $player_temp;
        }
    }
}