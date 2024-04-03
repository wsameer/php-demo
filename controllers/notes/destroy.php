<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'], $config['user'], $config['password']);

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
  'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes WHERE id = :id', [
  'id' => $_POST['id']
]);

header('location: /notes');
exit();