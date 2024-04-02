<?php

$config = require('config.php');
$db = new Database($config['database'], $config['user'], $config['password']);

$heading = 'My Notes';

$notes = $db->query('SELECT * FROM notes;')->get();

require "views/notes.view.php";