<?php 

use Core\Response;

function dd($param) {
  echo "<pre>";
  var_dump($param);
  echo "</pre>";

  die();
}

function urlIs($value) {
  return $_SERVER['REQUEST_URI'] === $value;
}

function abort() {
  http_response_code($code);
  require base_path("views/{$code}.php");
  die();
}

function authorize($condition, $statusCode = Response::FORBIDDEN) {
  if (!$condition) {
    abort($statusCode);
  }

  return true;
}

function base_path($path) {
  return BASE_PATH . $path;
}

function view($path, $attributes = []) {
  extract($attributes);
  require base_path('views/' . $path);
}

function redirect($path) {
  header('location {$path}');
  exit();
}

function old($key, $default = '') {
  return Core\Session::get('old')[$key] ?? $default;
}