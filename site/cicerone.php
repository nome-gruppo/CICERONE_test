<?php
<<<<<<< HEAD
session_start();
$nome= $_SESSION["nome"];
$cognome=$_SESSION['cognome'];
$telefono=$_SESSION['telefono'];
$mail=$_SESSION['mail'];
$password=$_SESSION['password'];
$citta=$_SESSION['citta'];
$lingua=$_SESSION['lingua'];
$lingua2=$_SESSION['lingua2'];
$lingua3=$_SESSION['lingua3'];
=======
namespace classi\users;
require_once '../classi/users/Cicerone.php';

$cicerone = new Cicerone();

session_start();

$cicerone = unserialize($_SESSION['cicerone']);
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
?>


<html lang="it">
  <head>
    <meta charset="UTF-8">
    <title>Area riservata</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"/> <!--ottimizza la visione su mobile dello slider-->

  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a class="navbar-brand" href="cicerone.php" button type="button" class="btn btn-default btn-lg"> Benvenuto  <?php echo $nome; ?> </a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
<<<<<<< HEAD
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $nome; ?></a>
=======
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $cicerone->getName(); ?></a>
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
          <ul class="dropdown-menu">
            <li><a href="#">Il mio profilo</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>   Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>


  <div class="list-group">
    <button type="button" class="list-group-item">Crea attività</button>
    <button type="button" class="list-group-item">Gestisci attività</button>
    <button type="button" class="list-group-item">Morbi leo risus</button>
    <button type="button" class="list-group-item">Porta ac consectetur ac</button>
    <button type="button" class="list-group-item">Vestibulum at eros</button>
  </div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    </body>
    </html>
