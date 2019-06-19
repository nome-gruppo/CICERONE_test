<link rel="stylesheet" href="css/bootstrap.min.css">

<?php
session_start();
require_once '..\classi\activities\Activity.php';

use classi\activities\Activity;

$cicerone=$_SESSION["cicerone"];

      if(isset($_POST["inviaDatiAttivita"])){
        $citta=$_POST['citta'];
        $costo=$_POST['costo'];
        $descrizione=$_POST['descrizione'];
        $lingua=$_POST['lingua'];
        $data=$_POST['data'];
        if($citta==""||$costo==""||$descrizione==""||$lingua==""||$data==""){
          echo "<div class='alert alert-danger' role='alert'>
            <a href='formAttivita.php' class='alert-link'>Non tutti i campi sono stati compilati! Click per riprovare</a>
          </div>";
        }else {
          $attivita=new Activity($idCicerone, $citta, $costo, $descrizione, $lingua, $data);
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
