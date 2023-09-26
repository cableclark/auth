<?php

namespace App\Controller;

use App\Application as app;
use App\Validation;

// Validtate the input

$validation = (new Validation($_POST))->validateForm();

dd($validation);

if (!empty($validation)) {
    view('register.view', $validation);

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
