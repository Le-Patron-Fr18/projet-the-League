<?php
class TeamManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM teams');
        $query->execute();
        $teams = $query->fetchAll(PDO::FETCH_ASSOC);
        $teams_return = [];
        foreach ($teams as $i => $game)
        {
           $team_temp = new Team;
            $team_temp->setId($teams["id"]);
            $team_temp->setName($teams["name"]);
            $team_temp->setLogo($teams["logo"]);
            $team_temp->setDescription($teams["description"]);
            $teams_return[] = $team_temp;
        }
        return $teams_return;
    }
    public function findOne(int $id) : ?Team
    {
        $query = $this->db->prepare('SELECT * FROM teams WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $team = $query->fetch(PDO::FETCH_ASSOC);
        $team_temp = new Game;
        if($team === null)
        {
            return null;
        }
        else
        {
            $team_temp->setId($team["id"]);
            $team_temp->setName($team["name"]);
            $team_temp->setLogo($team["logo"]);
            $team_temp->setDescription($team["description"]);
            {
                return $team_temp;  
            }
        }
    }
}