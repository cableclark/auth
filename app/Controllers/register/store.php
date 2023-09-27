<?php

namespace App\Controller;

use App\Application as app;
use App\Validation;

// Validtate the input

$validationErrors = (new Validation($_POST))->validateForm();

if (!empty($validationErrors)) {
    view('register.view', $validationErrors);

    return;
}

// if invalid return to view with data and errors

// if validated ppplate database ands return confiramtion

$database = app::$container->resolve('app\Database');

$data = $database->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

view('register.view');
