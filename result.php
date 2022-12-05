<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous'/>

  <title>Result - PHP Strong Password Generator</title>

</head>
<body>

  <div class="container-fluid bg-primary vh-100 d-flex align-items-center">

    <div class="container-lg text-center">

      <h2 class="text-light text-center mb-4">La password generata è:</h2>

      <p class="bg-info py-2 rounded-2 mb-4"><?php echo htmlspecialchars($_SESSION['psw']) ?></p>

      <a href="./index.php" class="btn btn-light">Torna alla home</a>

    </div>

  </div>

</body>
</html>