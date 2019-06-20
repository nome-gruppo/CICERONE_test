<?php
namespace classi\users;
require_once '..\classi\users\Cicerone.php';

$cicerone = new Cicerone();

session_start();

$cicerone=$_SESSION['cicerone'];
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
        <a class="navbar-brand" href="cicerone.php" button type="button" class="btn btn-default btn-lg"> Area riservata</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $cicerone->getName(); ?></a>
          <ul class="dropdown-menu">
            <li><a href="">Il mio profilo</a></li>
            <li><a href="gestioneAttivita.php">Le mie attività</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>   Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

  <h1>Benvenuto nell'area riservata!</h1></br></br>
  <div class="text-center">
    <a href="formAttivita.html" class="btn btn-primary" .btn{font-size: 30px;}>
      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>    CREA ATTIVITÀ</a>
  </div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    </body>
    </html>
