<?php
namespace App\Controller;

use App\Application as app;

class Login {
    

    public function index ()
    {

        return view("login.view");

    }
    

    public function login ()
    {

        $database = app::$container->resolve('app\Database');

        //User entered data

        $email = filter_var( $_POST['email'] ,FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];


        $data = $database->query('SELECT * FROM users WHERE email = :email', 
            ['email' => $email]
        );

        $user = $data->fetch();

        //Check for user and  Verify password

        if (!empty($user) && password_verify($password, $user["password"])) {
            //if the password entered matches the hashed password, we're in
            session_regenerate_id();
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $user["password"];
            view('dashboard.view');

        } else {
            view('login.view');
        }
        
    }

}