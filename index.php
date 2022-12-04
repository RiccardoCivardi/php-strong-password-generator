<!--
  Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli (!?&%$<>^+-*/()[]{}@#_=)) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php

Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale

Milestone 3
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.

Milestone 4 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.
-->

<?php

// Import functions.php

require_once __DIR__ . '/functions.php';

// var_dump($_SERVER);

var_dump($_GET);

// se non è vuoto il parametro in GET genero la password
if(!empty($_GET['psw-length'])){

  // creo la variabile $psw come risultato della funzione password_generate
  $psw = password_generate((int)$_GET['psw-length']);
  
  // apro la sessione
  session_start();
  // inizializzo la variabile di sessione
  $_SESSION['psw'] = $psw;
  // scelgo la destinazione
  header('Location: ./result.php');

}


// $psw_length = (int)$_GET['psw-length'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous'/>

  <title>PHP Strong Password Generator</title>

</head>

<body>

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" methods="GET">
  
  <input type="number" name="psw-length" class="form-control">

  <button type="submit" class="btn btn-primary">INVIA</button>

  
  </form>
  
</body>
</html>