<?php

// include database configuration
include "config.php";


class Locations
{
    // Properties
    private $query;
    private $dbConnector;

    // Constructor
    public function __construct()
    {
    }

    // Méthodes
    public function getLocations($query)
    {
        $statement = $this->dbConnector->prepare("SELECT * FROM locations WHERE location LIKE :query LIMIT 10");
        $statement->bindValue(':query', '%' . $query . '%');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function connect()
    {
        global $mysql_host, $mysql_user, $mysql_pwd, $mysql_dbname;
        try {
            $this->dbConnector = new PDO('mysql:host=' . $mysql_host . ';dbname=' . $mysql_dbname, $mysql_user, $mysql_pwd);
            return true;
        } catch (PDOException $e) {
            echo "Error connecting to database ";
            return false;
        }
    }
}
