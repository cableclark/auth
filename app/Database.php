<?php 

class Database {
    
    private $pdo;

    public function __construct($pdo) {

        $this->pdo = $pdo;

    }
   

    public function allSet () {
        
        echo "All is good";

    }
}