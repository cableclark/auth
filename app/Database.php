<?php

namespace App;

class Database
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function query($query, array $args = [])
    {
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':email', $_POST['email'], \PDO::PARAM_STR);
        $stmt->bindParam(':password', $_POST['password'], \PDO::PARAM_STR);

        if (!empty($args)) {
            return $stmt->execute(...$args);
        } else {
            return $stmt->execute();
        }
    }
}
