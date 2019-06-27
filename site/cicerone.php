<?php
namespace classi\users;
require_once '../classi/users/Cicerone.php';
require_once '../classi/utilities/Functions.php';
use classi\utilities\Functions;
$cicerone = new Cicerone();
$functions=new Functions();
session_start();
$cicerone = $_SESSION['utente'];
?>

<html lang="it">

<head>
  <meta charset="UTF-8">
  <title>Area riservata</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--ottimizza la visione su mobile dello slider-->

</head>

<body>
  <?php $functions->stampaNavbarCicerone($cicerone->getName()); ?>

  <h1>Benvenuto nell'area riservata!</h1><br /><br />
  <div class="text-center">
    <a href="formAttivita.php" class="btn btn-primary" .btn{font-size: 30px;}>
      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> CREA ATTIVITÀ</a>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


</body>

</html>
