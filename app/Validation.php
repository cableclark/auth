<?php

namespace App;

use App\Application as app;

class Validation
{
    private $data;

    public $errors = [];

    private static $fields = ['password', 'confirm-password', 'email'];

    public function __construct($postData)
    {
        $this->data = $postData;

        return $this;
    }

    public function validateForm()
    {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("'$field' is not present in the data");

                return;
            }
        }

        $this->validatePassword();
        $this->validateEmail();
        $this->uniqueEmail();

        return $this->errors;
    }

    private function validatePassword()
    {
        $val = trim($this->data['password']);

        $val2 = trim($this->data['confirm-password']);

        $this->empty('password', $val);

        $this->empty('cofirm-password', $val2);

        $this->isAplhanumeric('password', $val);

        $this->isAplhanumeric('cofirm-password', $val2);

        $this->isMatched('passwords', $val, $val2);

        dd($this->errors);
    }

    private function validateEmail()
    {
        $val = trim($this->data['email']);

        $this->empty('email', $val);

        if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', 'email must be a valid email address');
        }
    }

    private function uniqueEmail()
    {
        $val = trim($this->data['email']);

        // connect to database and try to retreive an entry with the same adress

        $database = app::$container->resolve('app\Database');

        $stmt = $database->query('SELECT email FROM users WHERE email = :email', [
             'email' => $_POST['email'],
         ]);

        $val = $stmt->fetch();

        // if result is not found proceeed, else add an error that the email has been used
        if (!empty($val)) {
            $this->addError('email', 'email is aleardy in use');
        }
    }

    private function addError($key, $val)
    {
        if (isset($this->errors[$key])) {
            array_push($this->errors[$key], $val);
        } else {
            $this->errors[$key] = [];
            array_push($this->errors[$key], $val);
        }
    }

    protected function empty($name, $value)
    {
        if (empty($value)) {
            $this->addError($name, "$name cannot be empty");
        }
    }

    protected function isAplhanumeric($name, $value)
    {
        if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $value)) {
            $this->addError($name, "$name must be 6-12 chars & alphanumeric");
        }
    }

    protected function isMatched($name, $first, $second)
    {
        if ($first !== $second) {
            $this->addError($name, "$name passwords must match");
        }
    }
}
