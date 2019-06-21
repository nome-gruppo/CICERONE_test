<?php
namespace classi\users;
require_once '../classi/users/Turista.php';

$turista = new Turista();

session_start();

$turista = $_SESSION['utente'];
?>

<html lang="it">
  <head>
    <meta charset="UTF-8">
    <title>Area riservata</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!--Fogli di stile datepicker-->
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />

    <!--Fine fogli di stile datepicker-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!--Script datepicker-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <!--Fine script datepicker-->

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
          <li><a href="ilMioProfilo.php">Il mio profilo</a></li>
          <li><a href="#">Attività in programma</a></li>
          <li><a href="#">Attività svolte</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>   Logout</a></li>
        </ul>
      </li>
    </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>


    <h1>Ricerca attivita</h1>

    <form action="listaAttivita.php" method="post">

      <div class="form-group col-md-4">
        <label for="lingua">Citta</label>
        <input type="text" class="form-control" id="citta" placeholder="Inserisci citta da cercare" name="citta">
      </div>
      <div class="form-group col-md-4">
        <label for="lingua">Lingua</label>
        <select class="form-control" id="lingua" name="lingua">
          <option>italiano</option>
          <option>inglese</option>
          <option>francese</option>
          <option>spagnolo</option>
          <option>tedesco</option>
          <option>cinese</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputDate">Data attività</label>
        <div class='input-group date' id="data">
          <input type='text' class="form-control" placeholder="gg/mm/aaaa" name="data" /> <span
            class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>
        </div>
      </div>
      </br>
    </br>
        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="ricercaAttivita">CERCA   <span class="  glyphicon glyphicon-zoom-in"></span></button>
          </div>
        </div>
        </form>

        <script src="js/bootstrap.min.js"></script>

        <!--Script Datepicker-->
        <script src="js/bootstrap-datepicker.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
          crossorigin="anonymous"></script>
        <script>
          jQuery(function () {
            jQuery('#data').datepicker({
              format: 'dd/mm/yyyy',
              startDate: '+1d',
              orientation: "bottom auto",
              autoclose: true
            });

          });
        </script>
        <!--Fine script Datepicker-->
        </body>

        </html>
