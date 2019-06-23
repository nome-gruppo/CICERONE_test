<?php
namespace classi\users;
require_once '..\classi\activities\Activity.php';
require_once '..\classi\utilities\Functions.php';
require_once '..\classi\users\Cicerone.php';
?>

<link rel="stylesheet" href="css/bootstrap.min.css">

<?php

session_start();


use classi\activities\Activity;
use classi\utilities\Functions;
use classi\users\Cicerone;

$cicerone = new Cicerone();

$cicerone=$_SESSION['utente'];
      $functions = new Functions();
      if(isset($_POST["inviaDatiAttivita"])){

        $attivita=new Activity($cicerone->getId(), $_POST['citta'], $_POST['costo'], $_POST['descrizione'], $_POST['lingua'], $functions->writeDateDb( $_POST['data']));
        

        if($attivita->getCitta()==""||$attivita->getCosto()==NULL||$attivita->getDescrizione()==""||$attivita->getLingua()==""||$attivita->getData()==""){
          echo "<div class='alert alert-danger' role='alert'>
            <a href='formAttivita.php' class='alert-link'>Non tutti i campi sono stati compilati! Click per riprovare</a>
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
 ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
