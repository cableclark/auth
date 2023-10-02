<?php

namespace App\Controller;
use App\Application as app;
use App\RegistrationValidation;

class Register {

    public function index () {

        return view('register.view');
    }
    

    public function store () {

        $validationErrors = (new RegistrationValidation($_POST))->validateForm();

        if (!empty($validationErrors)) {

            view('register.view', $validationErrors);

            return;
        }


        $database = app::$container->resolve('app\Database');

        $email = filter_var( $_POST['email'],FILTER_SANITIZE_EMAIL);

        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $data = $database->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
            'email' => $email,
            'password' => $hashed_password,
        ]);

        view('login.view');

    }

}


