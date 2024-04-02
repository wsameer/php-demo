<?php

$config = require('config.php');
$db = new Database($config['database'], $config['user'], $config['password']);

$currentUserId = 1;
$heading = 'Note';

$note = $db->query('SELECT * FROM notes where id = :id', [
  'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

if ($note['user_id'] !== $currentUserId) {
  abort(Response::FORBIDDEN);
}

require "views/note.view.php";