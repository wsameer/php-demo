<?php

namespace Http\Forms;

use Core\Validator;

final class LoginForm {
  protected $errors = [];

  public function __construct($attributes) {
    if (!Validator::email($email)) {
      $errors['email'] = 'Please provide a valid email address.';
    }

    if (Validator::string($password)) {
      $errors['password'] = 'Please provide a valid password.';
    }
  }

  public function validate($email, $password) {
     
    return empty($this->errors);
  }

  public function getErrors() {
    return $this->errors;
  }

  public function setError($field, $message = '') {
    $this->error[$field] = $message;
  }
}
