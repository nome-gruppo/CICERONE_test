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
   <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.js"></script>
  <!--Fine script datepicker-->

  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--ottimizza la visione su mobile dello slider-->
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <h2> Il mio profilo </h2>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $utente->getName(); ?></a>
          <ul class="dropdown-menu">
            <li><a href="ilMioProfilo.php">Il mio profilo</a></li>
            <?php
            if($utente instanceof Cicerone){
            <li><a href="gestioneAttivita.php">Le mie attività</a></li>
          }else{
            echo '  <li><a href="#">Attività in programma</a></li>
                    <li><a href="#">Attività svolte</a></li>';
          }
            ?>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>   Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

  <br />

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
              <td><?= $utente->getContact()->getMail() ?></td>
            </tr>
            <tr>
              <th>Password</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='vecchia_password'>
                  <input type='password' class="form-control" placeholder="Vecchia password" name="vecchia_password">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
                <br />
                <div class='input-group col-sm-9 col-xs-10' id='nuova_password'>
                  <input type='password' class="form-control" placeholder="Nuova password" name="nuova_password">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
                <br />
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
            <?php
            if ($utente instanceof Cicerone) {
              echo '<tr>';
              echo    '<th>Valutazione utenti</th>';
              echo    '<td>' . $utente->getValutazione() . '</td>';
              echo '</tr>';
              echo '<tr>';
              echo    '<th>Info premium</th>';
              echo    '<td>';
              echo '<div class="row">';
              echo '<div class="col-sm-7 col-xs-7">';

              if ($utente->getPremiumDate() == '0000-00-00') {

                echo 'Non sei ancora premium';
                echo '</div>';
                echo '<div class="col-sm-3 col-xs-3">';
                echo '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#premium">Diventa premium</button></div></td>';

              } else {

                echo $utente->getPremiumDate();
                echo '</div>';
                echo '<div class="col-sm-3 col-xs-3">';
                echo '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#premium">Disdici premium</button></div></td>';

              }
            }
            ?>
          </tbody>
        </table>

        <!-- Tasti -->
        <div class="row">
          <div class="col-sm-2 col-xs-2">
          </div>
          <div class="col-sm-3 col-xs-3">
            <button type="submit" class="btn btn-primary" name="modifica_dati">Modifica dati</button>
          </div>

          <div class="col-sm-3 col-xs-3">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#eliminaAccount">Elimina account</button>
          </div>

          <div class="col-sm-2 col-xs-2">
          </div>
        </div>
        <!-- Fine tasti -->

      </div>
      <div class="col-sm-2 col-xs-1">
      </div>

       <!-- Modal premium -->
       <div class="modal fade" id="premium" tabindex="-1" role="dialog" aria-labelledby="premiumLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <?php
              if ($utente->getPremiumDate() == '0000-00-00'){
                echo '<h3 class="modal-title" id="premiumLabel">Vuoi diventare premium?</h3>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo "Il costo dell'abbonamento premium è di €9.99 al mese.<br>";
                echo "L'abbonamento ti consentirà di inserire un numero illimitato di attività.";
                echo '</div>';

              }else{
                echo '<h3 class="modal-title" id="premiumLabel">Sicuro di voler disdire il tuo abbonamento premium?</h3>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo 'Ci dispiace che tu voglia disdire il tuo abbonamento premium.<br>';
                echo 'Ti ricordiamo che verranno conservate solo le 3 attività future create per prime.';
                echo '</div>';
              }
              ?>

            <br />
            <div class="modal-footer">
              <div class="row">
                <div class="col-sm-2 col-xs-2">
                </div>

                <div class="col-sm-3 col-xs-3">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
                <div class="col-sm-3 col-xs-3">
                <?php
                if ($utente->getPremiumDate() == '0000-00-00'){
                  echo '<button type="submit" class="btn btn-primary" name="diventa_premium">Diventa premium</button>';

                }else{
                  echo '<button type="submit" class="btn btn-primary" name="disdici_premium">Disdici premium</button>';
                }
                ?>
                </div>

                <div class="col-sm-2 col-xs-2">
                </div>
              </div>

            </div>
            <div class="col-sm-2 col-xs-1">
            </div>
          </div>
        </div>
      </div>
      <!--Fine Modal premium-->


      <!-- Modal elimina account -->
      <div class="modal fade" id="eliminaAccount" tabindex="-1" role="dialog" aria-labelledby="eliminaAccountLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="eliminaAccountLabel">Sicuro di voler eliminare l'account?</h3>
            </div>
            <div class="modal-body">
              Una volta eliminato l'account sarà impossibile recuperare i tuoi dati
            </div>
            <br />
            <div class="modal-footer">
              <div class="row">
                <div class="col-sm-2 col-xs-2">
                </div>

                <div class="col-sm-3 col-xs-3">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
                <div class="col-sm-3 col-xs-3">
                  <button type="submit" class="btn btn-danger" name="elimina_account">Elimina account</button>
                </div>

                <div class="col-sm-2 col-xs-2">
                </div>
              </div>

            </div>
            <div class="col-sm-2 col-xs-1">
            </div>
          </div>
        </div>
      </div>
      <!--Fine Modal elimina account-->


    </form>
  </div>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!--Script Datepicker-->
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

</body>

</html>
