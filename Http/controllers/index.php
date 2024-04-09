<?php

$_SESSION['name'] = "Sam";

view("index.view.php", [
  "heading" => "Home"
]);