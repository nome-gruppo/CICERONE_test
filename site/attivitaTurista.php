<?php

namespace classi\users;

require_once '../classi/users/Turista.php';
require_once '../classi/utilities/Functions.php';

use classi\utilities\Functions;

$turista = new Turista();
$functions = new Functions();
session_start();

$turista = $_SESSION['utente'];
?>

<html lang="it">

<head>
  <meta charset="UTF-8">
  <title>Lista attività</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--ottimizza la visione su mobile dello slider-->
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="jquery-1.6.1.js"></script>
</head>

<body>
  <?php
  $functions->stampaNavbarTurista($turista->getName());
  $result = null;
  if (isset($_GET["inProgramma"])) { //se l'utente clicca su attivita in programma
    $result = $turista->inProgramma($turista->getId());
  } else if (isset($_GET["attivitaSvolte"])) {//se l'utente clicca su attivita svolte
    $result = $turista->attivitaSvolte($turista->getId());
  }
  $num = mysqli_num_rows($result); //conto il numero di righe restituite dalla funzione
  if ($num > 0) {
    ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Titolo</th>
          <th scope="col">Citta</th>
          <th scope="col">Data</th>
          <th scope="col">Nome Cicerone</th>
          <th scope="col">Cognome</th>
          <th scope="col">Costo €</th>
          <th scope="col">Lingua</th>
          <th scope="col">Descrizione</th>
          <?php if (isset($_GET["inProgramma"])) { ?>
          <th scope="col">Cancella prenotazione</th>
        <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($riga = mysqli_fetch_assoc($result)) { //assoccio il risultato della funzione(record per record)a un array riga fin quando il record non sarà zero e quindi $riga diventerà false
          ?>
          <tr>
            <th scope="row"><?php echo $riga['titolo']; ?></th>
            <th scope="row"><?php echo $riga['citta']; //stampo il campo citta dell'array $riga
                            ?></th>
            <td><?php echo $riga['data_attivita']; ?></td>
            <td><?php echo $riga['nomeCicerone']; ?></td>
            <td><?php echo $riga['cognomeCicerone']; ?></td>
            <td><?php echo $riga['costo']; ?></td>
            <td><?php echo $riga['lingua']; ?></td>
            <td><?php echo $riga['descrizione']; ?></td>
            <td>
              <?php //la variabile diff restituisce una differenza dove ogni giorno vale '86400' quindi io voglio un diff che sia maggiore di 5 giorni=86400*5=432000
                $diff=strtotime($riga['data_attivita'])-strtotime(date('Y-m-d'));if ((isset($_GET["inProgramma"]))&&($diff>432000)){ ?>
              <a href="cancellaPrenotazione.php?<?php echo $riga['id_attivita'];?>"><button class="btn btn-primary"> CANCELLA <?php } ?></button></a></td>
            <td>
              <?php
              //se attività passata
              if ($riga['data_attivita'] < date('Y-m-d')) {
                echo '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#recensione">Recensisci</button>';
              }
              ?>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  <?php
  } else {
    echo "<div class='alert alert-danger' role='alert'>
          <a href='turista.php' class='alert-link'>Nessuna attività presente!</a>
        </div>";
  }
  ?>

  <form action="recensione.php" method="post">

    <!-- Modal elimina account -->
    <div class="modal fade" id="recensione" tabindex="-1" role="dialog" aria-labelledby="recensioneLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <!--header modal-->
          <div class="modal-header">
            <h3 class="modal-title" id="recensioneLabel">Scrivi la tua recensione</h3>
          </div>
          <!-- fine header modal-->
          <!--Modal body-->
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-3">
                <div class="rating-block">
                  <h4>Average user rating</h4>
                  <div class="ignore-my-css">
                  <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                  </button>
                  <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                  </button>
                  <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                  </button>
                  <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                  </button>
                  <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                  </button>
                  </div>
                </div>
              </div>


            </div>
          </div>
          <!--Fine modal body-->
          <br />
          <!--Tasti modal-->
          <div class="modal-footer">
            <div class="row">
              <div class="col-sm-2 col-xs-2">
              </div>

              <div class="col-sm-3 col-xs-3">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
              </div>
              <div class="col-sm-3 col-xs-3">
                <button type="submit" class="btn btn-primary" name="elimina_account">Scrivi recensione</button>
              </div>

              <div class="col-sm-2 col-xs-2">
              </div>
              <div class="col-sm-2 col-xs-1">
              </div>
            </div>
          </div>
          <!--Fine tasti modal-->
        </div>
      </div>
    </div>
    <!--Fine Modal elimina account-->

  </form>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>

</html>
