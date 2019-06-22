<?php
namespace classi\users;

use classi\utilities\Functions;

require_once '../classi/users/Turista.php';
require_once '../classi/users/Cicerone.php';
require_once '../classi/utilities/Functions.php';

session_start();

$utente = $_SESSION['utente'];
$functions = new Functions();
?>

<html lang="it">

<head>
  <meta charset="UTF-8">
  <title>Area riservata</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <!--Fogli di stile datepicker-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />

  <!--Fine fogli di stile datepicker-->

  <!--Script datepicker-->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
  <!--Fine script datepicker-->

  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--ottimizza la visione su mobile dello slider-->
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <h2>
          Il mio profilo </h2>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $utente->getName(); ?></a>
            <ul class="dropdown-menu">
              <li><a href="ilMioProfilo.php">Il mio profilo</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="homepage.html">Logout </a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  </br>

  <div class="container-fluid">
    <form action="modificaDati.php" method="post">
      <div class=" col-sm-2 col-xs-1">
      </div>
      <div class="col-sm-8 col-xs-10">
        <table class="table table-striped">

          <tbody>
            <tr>
              <th>Nome</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='nome'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getName(); ?>" name="nome">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Cognome</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='cognome'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getSurname(); ?>" name="cognome">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Data di nascita</th>
              <td>
                <div class='input-group date col-sm-9 col-xs-10' id='data_nascita'>
                  <input type='text' class="form-control" placeholder="<?= $functions->DateDb_to_Date($utente->getBirthDate()); ?>" name="data_nascita">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Email</th>
              <td><?=$utente->getContact()->getMail() ?></td>
            </tr>
            <tr>
              <th>Password</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='password'>
                  <input type='password' class="form-control" placeholder="Nuova password" name="password">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
                </br>
                <div class='input-group col-sm-9 col-xs-10' id='ripeti_password'>
                  <input type='password' class="form-control" placeholder="Ripeti password" name="ripeti_password">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Telefono</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='telefono'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getContact()->getPhone_num(); ?>" name="telefono">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Paese</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='nazione'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getAddress()->getNation(); ?>" name="nazione">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Provincia</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='provincia'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getAddress()->getCounty(); ?>" name="provincia">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Città</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='citta'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getAddress()->getCity(); ?>" name="citta">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Indirizzo</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='indirizzo'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getAddress()->getStreet(); ?>" name="indirizzo">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>CAP</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='CAP'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getAddress()->getCAP(); ?>" name="CAP">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="form-group">
        <div class="text-center">
          <button type="submit" class="btn btn-primary" name="invia_dati">Modifica dati</button>
        </div>
      </div>

      <div class=" col-sm-2 col-xs-1">
      </div>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!--Script Datepicker-->
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    jQuery(function() {
      jQuery('#data_nascita').datepicker({
        format: 'dd/mm/yyyy',
        endDate: '+0d',
        orientation: "bottom auto",
        autoclose: true
      });

    });
  </script>
  <!--Fine script Datepicker-->

</html>