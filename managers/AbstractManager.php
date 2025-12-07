<?php

abstract class AbstractManager
{
    protected PDO $db;

    public function __construct()
    {
        $host = "localhost";
        $port = "3306";
        $dbname = "Coda_prjet_tl";
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

        $user = "root";
        $password = "";

        $this->db = new PDO(
            $connexionString,
            $user,
            $password
        );

        // Bonus : activer les erreurs SQL
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}