<?php

namespace App\Controller;

use App\Validation;


dd($_POST);



//Validtate the input

$validation = new Validation($_POST); 

//if invalid return to view with data and errors


//if validated ppplate database ands return confiramtion 


view('register.view', $validation->validateForm());