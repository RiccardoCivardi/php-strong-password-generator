<?php 

function isCorrectLength($num, $min, $max) {
  
  $result = false;

  if($num >= $min && $num <= $max) {
    $result = true; 
  } 

  return $result;

}


// funzione semplice milestone 1
// function passwordGenerate($chars) {

//   $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz!?&%$<>^+-*/()[]{}@#_=';

//   return substr(str_shuffle($data), 0, $chars);

// } 

// funzione complessa milestone 4
function generatePassword($length, $listChars, $characters){
  $psw = '';

  while(strlen($psw) < $length){

    $char = getChar($listChars, $characters);

    // controllo univocità 
    if($_GET['allow-repetitions'] || !str_contains($psw, $char)){
      $psw .= $char;
    }

  }

  return $psw;
}

function getChar($listChars, $characters) {

  $index = $characters[rand(0, count($characters)-1)];

  // echo $index;

  $charStr = $listChars[$index];

  return $charStr[rand(0,strlen($charStr)-1)];
}


