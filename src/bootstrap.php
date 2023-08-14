<?php

require __DIR__ . '/../app/Container.php';
require __DIR__ . '/../app/Database.php';

use App\Container;

$container = new Container();

$container->bind('app\Database', function () {

  $host = 'igor.test';
  $dbname   = 'test';
  $user = 'root';
  $pass = '';
  $charset = 'utf8mb4';
  $port= '3306';


  $dsn = "mysql:host=$host;dbname=$dbname;port=$port;charset=$charset";
  $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
  ];
  $pdo = new PDO($dsn, $user, $pass, $options);

  $db = new Database($pdo); 

  return $db;

});

$database = $container->resolve('app\Database');


$database->allSet();