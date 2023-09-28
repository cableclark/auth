<?php

namespace App;

use App\Application as app;

class RegistrationValidation extends Validation
{
   
    /**
     * This is where you use the validation methods adn return the error array
     */

    public function validateForm()
    {
        $this->validatePassword();
        $this->validateEmail();

        return $this->errors;
    }
    
    //TODO: write a trim data function 


    private function validatePassword()
    {
        $val = trim($this->data['password']);

        $val2 = trim($this->data['confirmPassword']);

        $this->empty('password', $val);

        $this->empty('confirmPassword', $val2);

        $this->isAplhanumeric('password', $val);

        $this->isAplhanumeric('confirmPassword', $val2);

        $this->isMatched('confirmPassword', $val, $val2);
    }


    private function validateEmail()
    {
        $val = trim($this->data['email']);

        $this->empty('email', $val);

        $this->formatedEmail($val);

        $this->uniqueEmail();
    }


    

}
