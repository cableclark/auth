<?php 

namespace App;

class Validation {

    private $data;
    public $errors = [];
    private static $fields = ['password', 'confirm-password', 'email'];

    public function __construct($post_data){
        $this->data = $post_data;
        }

    public function validateForm(){

        foreach(self::$fields as $field){
            if(!array_key_exists($field, $this->data)){
            trigger_error("'$field' is not present in the data");
            return;
            }
        }

        $this->validatePassword();
        $this->validateEmail();
        
        return $this->errors;

    }

    private function validatePassword(){

        $val = trim($this->data['password']);
        
        $val2 = trim($this->data['confirm-password']);

        if(empty($val)){
            $this->addError('password', 'password cannot be empty');    
        } 
        elseif (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
            $this->addError('password','password must be 6-12 chars & alphanumeric');
            }
        elseif ($val !== $val2) {
            $this->addError('email', 'email must be a valid email address');
            }
            
    }

    private function validateEmail(){

        $val = trim($this->data['email']);

        if(empty($val)){
            $this->addError('email', 'email cannot be empty');
        } else {
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
            $this->addError('email', 'email must be a valid email address');
            }
        } 

    }


    private function uniqueEmail(){

        $val = trim($this->data['email']);


        $database = $container->resolve('app\Database');
        
        if(empty($val)){
            $this->addError('email', 'email cannot be empty');
        } else {
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
            $this->addError('email', 'email must be a valid email address');
            }
        } 

    }

    private function addError($key, $val){

        $this->errors[$key] = $val;
    
    }

}