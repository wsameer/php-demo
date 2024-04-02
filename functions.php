<?php 

function dd($param) {
  echo "<pre>";
  var_dump($param);
  echo "</pre>";

  die();
}

function urlIs($value) {
  return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = Response::NOT_FOUND) {
  http_response_code($code);
  require "views/{$code}.php";
  die();
}

function authorize($condition, $statusCode = Response::FORBIDDEN) {
  if (!$condition) {
    abort($statusCode);
  }
}