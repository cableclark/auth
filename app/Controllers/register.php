<?php

namespace App;


$validation = new Validation($_POST); 


view('register.view', $validation->validateForm());
