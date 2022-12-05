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

// var_dump($_SERVER);

var_dump($_GET);

// Faccio partire la $_SESSION se non è già attiva
// ??? mi da errore mostrandomi sempre la stessa psw
// session_unset();
// if(isset($_SESSION)) {
//   session_start();
// }

// Import functions.php
require_once __DIR__ . '/functions.php';

// Import vars.php
require_once __DIR__ . '/vars.php';

//list characters
$listChars = [
  'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
  '0123456789',
  '!?&%$<>^+-*/()[]{}@#_='
];

//se non passo la tipologia di caratteri l'array di estrazione è completo, altrimenti è ciò che gli passo
$characters = $_GET['characters'] ?? [0,1,2];

// var_dump($characters);

// se non è vuoto il parametro (psw-length) in GET genero la password
if(!empty($_GET['psw-length'])){

  // controllo la lunghezza
  $response = isCorrectLength((int)$_GET['psw-length'], $minLimit, $maxLimit);

  // se la lunghezza va bene
  if($response) {

    // creo la variabile $psw come risultato della funzione generatePassword
    $psw = generatePassword($_GET['psw-length'], $listChars, $characters);
    
    // inizializzo la variabile di sessione
    session_start();
    $_SESSION['psw'] = $psw;
    // scelgo la destinazione
    header('Location: ./result.php');

  }

}

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

  <div class="container-fluid bg-primary vh-100 d-flex align-items-center">

    <div class="container-lg">

      <h1 class="text-light text-center mb-2">Strong Password Generator</h1>
      <h2 class="text-light text-center mb-4">Genera una password sicura</h2>

      <?php if(empty($_GET['psw-length'])) : ?>
        <div class="alert alert-info text-center" role="alert">
          Scegliere una password con un minimo di <?php echo $minLimit ?> 
          e un massimo di <?php echo $maxLimit ?> caratteri.
        </div>
      <?php endif; ?>  

      <?php if(isset($response) && !$response) : ?>
        <div class="alert alert-danger text-center" role="alert">
          Errore! 
          La lunghezza della password deve essere compresa tra un minimo di <?php echo $minLimit ?> 
          e un massimo di <?php echo $maxLimit ?> caratteri.
        </div>
      <?php endif; ?>
        

      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" methods="GET" class="bg-warning p-5 rounded-2">

      <div class="row mb-3">

        <div class="col-6">
          <label for="psw-length" class="form-label">Lunghezza password:</label>
        </div>

        <div class="col-2">
          <!--Possibile controllo ulteriore min="< ?php //echo $minLimit?>" max="< ?php echo $maxLimit?>" -->
          <input type="number" name="psw-length" id="psw-length" class="form-control">
        </div>

      </div>

      <div class="row mb-3">

        <div class="col-6">
          <label class="form-label">Consenti ripetizioni di uno o più caratteri:</label>
        </div>

        <div class="col-2">

          <div>
            <input class="form-check-input" type="radio" name="allow-repetitions" value="0" id="yes-repetitions" checked>
            <label class="form-check-label" for="yes-repetitions">Si</label>
          </div>

          <div>
            <input class="form-check-input" type="radio" name="allow-repetitions" value="1" id="no-repetitions">
            <label class="form-check-label" for="no-repetitions">No</label>
          </div>

        </div>
        
      </div>

      <div class="row mb-3">
        <div class="col-1 offset-6">

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="characters[]" id="characters1" value="0">
            <label class="form-check-label" for="characters1">Lettere</label>
          </div>
    
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="characters[]" id="characters2" value="1">
            <label class="form-check-label" for="characters2">Numeri</label>
          </div>
    
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="characters[]" id="characters3" value="2">
            <label class="form-check-label" for="characters3">Simboli</label>
          </div>

        </div>
      </div>
    
      <button type="submit" class="btn btn-primary me-3">INVIA</button>
      <button type="reset" class="btn btn-secondary">Annulla</button>
    
      </form>
      
    </div>

  </div>

</body>
</html>