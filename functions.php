<?php 

function passwordGenerate($chars) {

  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz!?&%$<>^+-*/()[]{}@#_=';

  return substr(str_shuffle($data), 0, $chars);

} 

function isCorrectLength($num, $min, $max) {
  
  $result = false;

  if($num >= $min && $num <= $max) {
    $result = true; 
  } 

  return $result;
}