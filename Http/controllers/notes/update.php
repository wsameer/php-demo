<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;
$MAX_LENGTH_ALLOWED = "255";
$MIN_LENGTH_ALLOWED = "1";

// find the corresponding note
$note = $db->query('select * from notes where id = :id', [
  'id' => $_POST['id']
])->findOrFail();

// authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);

// validate the form
$errors = [];

if (Validator::string($_POST['body'])) {
  $errors['body'] = 'A body is required';
}

if (! Validator::validateLength($_POST['body'], $MIN_LENGTH_ALLOWED, $MAX_LENGTH_ALLOWED)) {
  $errors['body'] = 'Your note cannot be more than ' . $MAX_LENGTH_ALLOWED . ' characters!';
}

// if no validation errors, update the record in the notes database table.
if (count($errors)) {
  return view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'errors' => $errors,
    'note' => $note
  ]);
}

$db->query('update notes set body = :body where id = :id', [
  'id' => $_POST['id'],
  'body' => $_POST['body']
]);

// redirect the user
header('location: /notes');
die();