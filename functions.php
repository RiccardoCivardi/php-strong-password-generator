<?php 

function password_generate($chars) {

  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz!?&%$<>^+-*/()[]{}@#_=';

  return substr(str_shuffle($data), 0, $chars);

} 