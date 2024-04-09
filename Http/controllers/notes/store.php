<?php

use Core\App;
use Core\Database;
use Core\Validator;

$MAX_LENGTH_ALLOWED = "255";
$MIN_LENGTH_ALLOWED = "1";

$db = App::resolve(Database::class);

$errors = [];

if (Validator::string($_POST['body'])) {
  $errors['body'] = 'A body is required';
}

if (! Validator::validateLength($_POST['body'], $MIN_LENGTH_ALLOWED, $MAX_LENGTH_ALLOWED)) {
  $errors['body'] = 'Your note cannot be more than ' . $MAX_LENGTH_ALLOWED . ' characters!';
}

if (! empty($errors)) {
  return view("notes/create.view.php", [
    "heading" => "Create Note",
    "errors" => $errors
  ]);
}
  
$db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
  "body" => $_POST['body'],
  "user_id" => 1
]);

header('location: /notes');
die();
