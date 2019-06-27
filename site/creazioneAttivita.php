<?php
namespace classi\users;

require_once '..\classi\activities\Activity.php';
require_once '..\classi\utilities\Functions.php';
require_once '..\classi\users\Cicerone.php';
session_start();
use classi\activities\Activity;
use classi\utilities\Functions;
$cicerone = new Cicerone();
<<<<<<< HEAD
$functions = new Functions();
$cicerone=$_SESSION['utente'];
?>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <?php
      $numeroAttivita=$cicerone->contaAttivita();
      if(isset($_POST["inviaDatiAttivita"])&&($numeroAttivita['0']<$cicerone::MAX_ACTIVITY)){
        $attivita=new Activity($cicerone->getId(), $_POST['citta'], $_POST['costo'], $_POST['descrizione'], $_POST['lingua'], $functions->writeDateDb( $_POST['data']));
        if($attivita->getCitta()==""||$attivita->getCosto()==NULL||$attivita->getDescrizione()==""||$attivita->getLingua()==""||$attivita->getData()==""){
          echo "<div class='alert alert-danger' role='alert'>
            <a href='formAttivita.html' class='alert-link'>Non tutti i campi sono stati compilati! Click per riprovare</a>
          </div>";
        }else {

          	$result=$attivita->insertDatabase();
        }
          if($result){
            echo "<div class='alert alert-success' role='alert'>
              <a href='cicerone.php' class='alert-link'>Attivita creata con successo! Click per tornare all'area riservata</a>
            </div>";
          }
        }
        else{
          echo "<div class='alert alert-danger' role='alert'>
            <a href='ilMioProfilo.php' class='alert-link'>Esaurito il numero massimo di attivita gratuite da creare! Click per diventare premimum</a>
          </div>";
        }
 ?>
=======

$cicerone = $_SESSION['utente'];
$functions = new Functions();
if (isset($_POST["inviaDatiAttivita"])) {

  $attivita = new Activity($cicerone->getId(), $_POST['titolo'], $_POST['citta'], $_POST['costo'], $_POST['descrizione'], $_POST['lingua'], $functions->writeDateDb($_POST['data']));


  if ($attivita->getCitta() == "" || $attivita->getTitolo() == "" || $attivita->getCosto() == NULL || $attivita->getDescrizione() == "" || $attivita->getLingua() == "" || $attivita->getData() == "") {
    echo "<div class='alert alert-danger' role='alert'>
            <a href='formAttivita.php' class='alert-link'>Non tutti i campi sono stati compilati! Click per riprovare</a>
          </div>";
  } else {

    $result = $attivita->insertDatabase();
  }
  if ($result) {
    echo "<div class='alert alert-success' role='alert'>
              <a href='cicerone.php' class='alert-link'>Attivita creata con successo! Click per tornare all'area riservata</a>
            </div>";
  }
}
?>
>>>>>>> e98371685b21ae9059d877d813769a25532bb2a6

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>