<?php 

namespace App;

class Database {
    
    private $pdo;

    public function __construct($pdo) {

        $this->pdo = $pdo;

    }
   

    public function query ($query, array $args=[]) {
        
        $stmt = $this->pdo->prepare($query);

        if (!empty($args)) {

            echo "Arguments have been set";

        } else {
            return  $stmt->execute();

        }

    }
}