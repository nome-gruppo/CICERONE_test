<?php
require_once '../classi/utilities/Database.php';
require_once '../classi/utilities/Functions.php';
require_once '../classi/users/Turista.php';
require_once '../classi/activities/Review.php';

use classi\utilities\Database;
use classi\utilities\Functions;
use classi\activities\Review;
use classi\users\Turista;

?>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>

<?php

session_start();

$turista = $_SESSION['utente'];
$id_cicerone = $_SESSION['id_cicerone'];
// connessione database
$database = new Database();
$link = $database->getConnection();

$functions = new Functions();


if (isset($_POST["scrivi_recensione"])){

    if(!isset($_POST["rating"]) || $_POST["titolo_recensione"] == ""){
        echo "<div class='alert alert-danger' role='alert'>
                    <a href='scriviRecensione.php' class='alert-link'>Inserisci i campi valutazione e titolo! Click per riprovare</a>
                    </div>";
    }else{

        $recensione = new Review($id_cicerone,$turista->getId(),$_POST["titolo_recensione"],$_POST["rating"], $_POST["testo_recensione"]);

        $query_recensione = "INSERT into {$database->getReview_table()} values('{$recensione->getTitle()}', '{$recensione->getValutation()}','{$recensione->getText()}','{$recensione->getId_cicerone()}','{$recensione->getId_turista()}')";
                
        $result_recensione = mysqli_query($link, $query_recensione) or die("Errore salvataggio recensione!");

        if ($result_recensione) {
          echo "<div class='alert alert-success' role='alert'>
            <a href='turista.php' class='alert-link'>Recensione scritta con successo! Click per tornare nell'area riservata</a>
          </div>";

          //aggiorna il campo valutazione del cicerone
          //cerca cicerone nel database
          $query_ricerca = "SELECT valutazione FROM recensioni where id_cicerone = '$id_cicerone'";
          $result_ricerca = mysqli_query($link, $query_ricerca) or die("Errore ricerca cicerone in recensioni!");

          if($result_ricerca){
              $somma_valutazioni = 0.0;
              $num_valutazioni = 0.0;
              $media_valutazioni = 0.0;

            while($row = mysqli_fetch_array($result_ricerca)){
                $somma_valutazioni += intval($row['valutazione']);
                $num_valutazioni++;
            }

            //controllo per evitare una divisione per 0
            if($num_valutazioni != 0){
                $media_valutazioni = $somma_valutazioni / $num_valutazioni;

                //aggiorna tabella ciceroni
                $query_aggiornamento = "UPDATE ciceroni  SET valutazione = '$media_valutazioni' WHERE id_cicerone = '$id_cicerone'";
                $result_aggiornamento = mysqli_query($link, $query_aggiornamento) or die("Errore aggiornamento valutazione cicerone!");
            }else{
                trigger_error('Errore divisione per 0');
            }
          }
        }
    }    
}




mysqli_close($link);
?>