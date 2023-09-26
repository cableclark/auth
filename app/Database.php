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

        if (!empty($args)) {
            $stmt->execute($args);

            return $stmt;
        } else {
            $stmt->execute();

            return $stmt;
        }
    }
}
