<?php
namespace classi\users;
require_once '../classi/users/Turista.php';
require_once '../classi/utilities/Functions.php';
use classi\utilities\Functions;
$turista = new Turista();
$functions=new Functions();
session_start();

$turista = $_SESSION['utente'];
?>
<!DOCTYPE html>
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
  <?php $functions->stampaNavbarTurista($turista->getName()) ?>


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
      <div class="form-group col-md-2">
        <label for="inputDate">Data ricerca da</label>
        <div class='input-group date' id="dataInizio">
          <input type='text' class="form-control" placeholder="gg/mm/aaaa" name="dataInizio" /> <span
            class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>
        </div>
      </div>
      <div class="form-group col-md-2">
        <label for="inputDate">Data ricerca a</label>
        <div class='input-group date' id="dataFine">
          <input type='text' class="form-control" placeholder="gg/mm/aaaa" name="dataFine" /> <span
            class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>
        </div>
      </div>
      <br />
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
            jQuery('#dataInizio').datepicker({
              format: 'dd/mm/yyyy',
              startDate: '+1d',
              orientation: "bottom auto",
              autoclose: true
            });

          });
        </script>
        <script>
          jQuery(function () {
            jQuery('#dataFine').datepicker({
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
