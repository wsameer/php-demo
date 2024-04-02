<?php

require('Validator.php');

$config = require('config.php');
$db = new Database($config['database'], $config['user'], $config['password']);

$MAX_LENGTH_ALLOWED = "255";
$MIN_LENGTH_ALLOWED = "1";
$heading = "Create Note";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $errors = [];

  if ($Validator::string($_POST['body'])) {
    $errors['body'] = 'A body is required';
  }

  if (! $Validator::validateLength($_POST['body'], $MIN_LENGTH_ALLOWED, $MAX_LENGTH_ALLOWED)) {
    $errors['body'] = 'Your note cannot be more than ' . $MAX_LENGTH_ALLOWED . ' characters!';
  }

  if (! $Validator::email($_POST['body'])) {
    $errors['email'] = 'Invalid email address!';
  }
  
  if (empty($errors)) {
    $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
      "body" => $_POST['body'],
      "user_id" => 1
    ]);
  }
}

require 'views/notes/create.view.php';