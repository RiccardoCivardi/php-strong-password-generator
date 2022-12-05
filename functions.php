<?php 

function isCorrectLength($num, $min, $max) {
  
  $result = false;

  if($num >= $min && $num <= $max) {
    $result = true; 
  } 

  return $result;

}


// funzione complessa milestone 4
function generatePassword($length, $listChars, $characters){
  $psw = '';

  // controllo lunghezza massima numeri e simboli
  $totalLength = 0;

  foreach($characters as $charIndex){
    // calcolo la lunghezza totale dei caratteri
    $totalLength += strlen($listChars[$charIndex]);
    
  }

  // lunghezza blindata se non ci sono abbastanza caratteri e se ho scelto di non avere ripetizioni
  if($length > $totalLength && $_GET['allow-repetitions'] == 1 ) $length = $totalLength;


  while(strlen($psw) < $length){

    $char = getChar($listChars, $characters);

    // controllo univocità 
    if($_GET['allow-repetitions'] && !str_contains($psw, $char)){
      $psw .= $char;
    } else {
      $psw .= $char;
    }


  }

  return $psw;
}

function getChar($listChars, $characters) {

  // estraggo indice array caratteri
  $index = $characters[rand(0, count($characters)-1)];

  // echo $index;

  // prendo la lista di caratteri estratta 
  $charStr = $listChars[$index];

  // estraggo random dalla lista selezionata
  return $charStr[rand(0,strlen($charStr)-1)];
}


