<?php

namespace Core;

class Validator {

  /**
   * Returns true if the value is empty
   */
  public static function string($value) {
    return strlen(trim($value)) === 0;
  }

  public static function validateLength($value, $min = 1, $max = 255) {
    $value= trim($value);
    return strlen($value) >= $min && strlen($value) <= $max;
  }

  public static function email($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }
}
