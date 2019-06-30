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
<!DOCTYPE html>
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
    $result = $turista->inProgramma();
  } else if (isset($_GET["attivitaSvolte"])) {//se l'utente clicca su attivita svolte
    $result = $turista->attivitaSvolte();
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
                ?>
               <a href="scriviRecensione.php?id_cicerone=<?php echo $riga['id_cicerone'];?>"><button type="button" class="btn btn-primary btn-sm" >Recensisci</button></a>
               <?php
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




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script>
    $("button").click(function() {
      var fired_button = $(this).val();

      $.post('recensione.php', {variable: fired_button});

    })
  </script>

</body>

</html>
