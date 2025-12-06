<?php
class PlayerManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT *,media.url,media.alt FROM players INNER JOIN media ON players.portrait = media.id');
        $query->execute();
        $players = $query->fetchAll(PDO::FETCH_ASSOC);
        $players_return = [];
        foreach ($players as $i => $player)
        {
            $player_temp = new Player; 
            $player_temp->setId($player["id"]);
            $player_temp->setNickname($player["nickname"]);
            $player_temp->setBio($player["bio"]);
            $player_temp->setPortrait($player["portrait"]);
            $player_temp->setTeam($player["team"]);
            $player_temp->setUrl($player["url"]);
            $player_temp->setAlt($player["alt"]);
            $players_return[] = $player_temp;
        }
        return $players_return;
    }
    public function findOne(int $id) : ?Player
    {
        $query = $this->db->prepare('SELECT *,media.url,media.alt FROM players INNER JOIN media ON players.portrait = media.id WHERE players.id = :id');
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
            $player_temp->setNickname($player["nickname"]);
            $player_temp->setBio($player["bio"]);
            $player_temp->setPortrait($player["portrait"]);
            $player_temp->setTeam($player["team"]);
            $player_temp->setUrl($player["url"]);
            $player_temp->setAlt($player["alt"]);
            return $player_temp;
        }
    }
    public function findAllFromTeam(int $id) : ?Team
    {
        $query = $this->db->prepare('SELECT *, media.url, media.alt FROM players JOIN teams ON players.team = teams.id JOIN media ON players.portrait = media.id WHERE players.id = :id');
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
            $player_temp->setNickname($player["nickname"]);
            $player_temp->setBio($player["bio"]);
            $player_temp->setPortrait($player["portrait"]);
            $player_temp->setTeam($player["team"]);
            $player_temp->setUrl($player["url"]);
            $player_temp->setAlt($player["alt"]);
            return $player_temp;
        }
    }
}