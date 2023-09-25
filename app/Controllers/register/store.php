<?php

namespace App\Controller;

use App\Application as app;
use App\Validation;

// Validtate the input

$validation = new Validation($_POST);

// if invalid return to view with data and errors

// if validated ppplate database ands return confiramtion

$database = app::$container->resolve('app\Database');

$data = $database->query('INSERT INTO users (email, password) VALUES (:email, :password)');

view('register.view', $validation->validateForm());
