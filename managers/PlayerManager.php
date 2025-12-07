<?php
class PlayerManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT players.*,media.url,media.alt,teams.name FROM players INNER JOIN media ON players.portrait = media.id INNER JOIN teams ON players.team = teams.id');
        $query->execute();
        $players = $query->fetchAll(PDO::FETCH_ASSOC);
        $players_return = [];
        foreach ($players as $i => $players)
        {
<<<<<<< HEAD
            $players_temp = new Player; 
            $players_temp->setId($players["id"]);
            $players_temp->setNickname($players["nickname"]);
            $players_temp->setBio($players["bio"]);
            $players_temp->setPortrait($players["portrait"]);
            $players_temp->setTeam($players["team"]);
            $players_temp->setUrl($players["url"]);
            $players_temp->setAlt($players["alt"]);
            $players_return[] = $players_temp;
=======
            $player_temp = new Player; 
            $player_temp->setId($player["id"]);
            $player_temp->setNickname($player["nickname"]);
            $player_temp->setBio($player["bio"]);
            $player_temp->setPortrait($player["portrait"]);
            $player_temp->setTeam($player["team"]);
            $player_temp->setUrl($player["url"]);
            $player_temp->setAlt($player["alt"]);
            $player_temp->setTeamName($player["name"]);
            $players_return[] = $player_temp;
>>>>>>> 1d8dd81d37435c9d86582983a825d2a292d98557
        }
        return $players_return;
    }
    public function findOne(int $id) : ?Player
    {
        $query = $this->db->prepare('SELECT players.*,media.url,media.alt,teams.name FROM players INNER JOIN media ON players.portrait = media.id INNER JOIN teams ON players.team = teams.id WHERE players.id = :id');
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
<<<<<<< HEAD
            $players_temp->setId($players["id"]);
            $players_temp->setNickname($players["nickname"]);
            $players_temp->setBio($players["bio"]);
            $players_temp->setPortrait($players["portrait"]);
            $players_temp->setTeam($players["team"]);
            $players_temp->setUrl($players["url"]);
            $players_temp->setAlt($players["alt"]);
            return $players_temp;
=======
            $player_temp->setId($player["id"]);
            $player_temp->setNickname($player["nickname"]);
            $player_temp->setBio($player["bio"]);
            $player_temp->setPortrait($player["portrait"]);
            $player_temp->setTeam($player["team"]);
            $player_temp->setUrl($player["url"]);
            $player_temp->setAlt($player["alt"]);
            $player_temp->setTeamName($player["name"]);
            return $player_temp;
>>>>>>> 1d8dd81d37435c9d86582983a825d2a292d98557
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