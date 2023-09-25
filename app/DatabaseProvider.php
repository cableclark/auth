<?php

use App\Application as app;
use App\Database;

require __DIR__.'/../src/config.php';

$config = require __DIR__.'/../src/config.php';

app::$container->bind('app\Database', function (array $config) {
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};port={$config['port']};charset={$config['charset']};";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo = new PDO($dsn, $config['user'], $config['pass'], $options);

    $db = new Database($pdo);

    return $db;
}, $config['database']);
