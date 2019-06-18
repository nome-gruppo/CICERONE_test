<?php
<<<<<<< HEAD
require_once '../classi/users/Turista.php';
session_start();

$turista = new classi\users\Turista();

$turista->setName($_SESSION["nome"]);
$turista->setSurname($_SESSION['cognome']);
$turista->setContact($_SESSION['mail'], $_SESSION['telefono']);
$turista->setPassword($_SESSION['password']);

=======
namespace classi\users;
require_once '../classi/users/Turista.php';

$turista = new Turista();

session_start();

$turista = unserialize($_SESSION['turista']);

var_dump($turista);
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
      <a class="navbar-brand" href="turista.php" button type="button" class="btn btn-default btn-lg">
      Benvenuto </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $turista->getName(); ?></a>
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








<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>
