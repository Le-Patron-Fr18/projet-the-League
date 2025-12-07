<?php
class PlayerPerformancesManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM playerperformance');
        $query->execute();
        $playerperformance = $query->fetchAll(PDO::FETCH_ASSOC);
        $playerperformance_return = [];
        foreach ($playerperformance as $i => $playerperformance)
        {
            $playerperformance_temp = new Player_performance; 
            $playerperformance_temp->setId($playerperformance["id"]);
            $playerperformance_temp->setPlayer($playerperformance["player"]);
            $playerperformance_temp->setGame($playerperformance["game"]);
            $playerperformance_temp->setPoints($playerperformance["points"]);
            $playerperformance_temp->setAssists($playerperformance["assists"]);
            $playerperformance_return[] = $playerperformance_temp;
        }
        return $playerperformance_return;
    }
    public function findOne(int $id) : ?Player_performance
    {
        $query = $this->db->prepare('SELECT * FROM playerperformance WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $playerperformance = $query->fetch(PDO::FETCH_ASSOC);
        $playerperformance_temp = new Player_performance;
        if($playerperformance === null)
        {
            return null;
        }
        else
        {
            $playerperformance_temp->setId($playerperformance["id"]);
            $playerperformance_temp->setPlayer($playerperformance["player"]);
            $playerperformance_temp->setGame($playerperformance["game"]);
            $playerperformance_temp->setPoints($playerperformance["points"]);
            $playerperformance_temp->setAssists($playerperformance["assists"]);
            return $playerperformance_temp;
        }
    }
    public function findAllFromTeam(int $id) : array
    {
        $query = $this->db->prepare('SELECT * FROM playerperformance');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        $playerperformance = $query->fetchAll(PDO::FETCH_ASSOC);
        $playerperformance_return = [];
        foreach ($playerperformance as $i => $playerperformance)
        {
            $playerperformance_temp = new Player_performance; 
            $playerperformance_temp->setId($playerperformance["id"]);
            $playerperformance_temp->setPlayer($playerperformance["player"]);
            $playerperformance_temp->setGame($playerperformance["game"]);
            $playerperformance_temp->setPoints($playerperformance["points"]);
            $playerperformance_temp->setAssists($playerperformance["assists"]);
            $playerperformance_return[] = $playerperformance_temp;
        }
        return $playerperformance_return;
    }
}