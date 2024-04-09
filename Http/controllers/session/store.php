<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
  "email" => $_POST['email'],
  "password" => $_POST['password']
]);

// dd( $_POST['email']);

$signedIn = (new Authenticator)->attempt(
  $attributes['email'], $attributes['password']
);

if (!$signedIn) {
  $form->setError(
    'email', 'No matching account found for that email and password combination'
  )->throw();
}

redirect('/');