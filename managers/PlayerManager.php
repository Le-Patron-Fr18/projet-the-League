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
        foreach ($players as $i => $players)
        {
            $players_temp = new Player; 
            $players_temp->setId($players["id"]);
            $players_temp->setNickname($players["nickname"]);
            $players_temp->setBio($players["bio"]);
            $players_temp->setPortrait($players["portrait"]);
            $players_temp->setTeam($players["team"]);
            $players_temp->setUrl($players["url"]);
            $players_temp->setAlt($players["alt"]);
            $players_return[] = $players_temp;
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
        $players = $query->fetch(PDO::FETCH_ASSOC);
        $players_temp = new Player;
        if($players === null)
        {
            return null;
        }
        else
        {
            $players_temp->setId($players["id"]);
            $players_temp->setNickname($players["nickname"]);
            $players_temp->setBio($players["bio"]);
            $players_temp->setPortrait($players["portrait"]);
            $players_temp->setTeam($players["team"]);
            $players_temp->setUrl($players["url"]);
            $players_temp->setAlt($players["alt"]);
            return $players_temp;
        }
    }
    public function findAllFromTeam(int $teamId) : array
    {
        $query = $this->db->prepare(
            'SELECT players.*, media.url, media.alt 
            FROM players 
            INNER JOIN media ON players.portrait = media.id
            WHERE players.team = :teamId'
        );

        $query->execute(['teamId' => $teamId]);
        $players = $query->fetchAll(PDO::FETCH_ASSOC);

        $players_return = [];

        foreach ($players as $players)
        {
            $p = new Player;
            $p->setId($players["id"]);
            $p->setNickname($players["nickname"]);
            $p->setBio($players["bio"]);
            $p->setPortrait($players["portrait"]);
            $p->setTeam($players["team"]);
            $p->setUrl($players["url"]);
            $p->setAlt($players["alt"]);
            $players_return[] = $p;
        }

        return $players_return;
    }
}