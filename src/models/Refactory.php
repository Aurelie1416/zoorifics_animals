<?php

namespace App\ZoorificsAnimals\models;

abstract class Refactory
{
    /** @var \PDO */
    protected $pdo;

    public function __construct()
    {
        var_dump('coucou');
        $dsn = 'mysql:dbname=zoorifics_animals;host=localhost';
        $this->pdo = new \PDO($dsn, 'root', '', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);    
    }

    /** 
     * @param string $query
     * @param array $params 
    */
    protected function prepareAndExecute(string $query, array $params = []): \PDOStatement
    {
        $pdo = $this->pdo->prepare($query);
        $pdo->execute($params);

        return $pdo;
    }
}
