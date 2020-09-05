<?php

namespace App\Utils;

use Illuminate\Support\Facades\Hash;
class HashProvider {
  static function hashPassword($password) {
    return Hash::make($password);
  }

  static function passwordsMatch($input, $hashedPassword) {
    $matches =  Hash::check($input, $hashedPassword);
    return $matches;
  }
}