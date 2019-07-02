<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>

<?php

require_once '../classi/utilities/Functions.php';
require_once '../classi/users/Turista.php';
define('ID_CICERONE', 'id_cicerone');

use classi\utilities\Functions;
use classi\users\Turista;

session_start();

$turista = new Turista();
$turista = $_SESSION['utente'];

$functions = new Functions();
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Recensione</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--ottimizza la visione su mobile dello slider-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="jquery-1.6.1.js"></script>
</head>

<body>
    <?php
    $functions->stampaNavbarTurista($turista->getName());

    if (isset($_GET[ID_CICERONE])) {

        $_SESSION[ID_CICERONE] = $_GET[ID_CICERONE];
    }
    ?>
    <form action="salvaRecensione.php" method="post">

        <br /><br /><br /><br />
        <div class="container-fluid">
            <div class="col-sm-2 col-xs-1">
            </div>

            <div class="col-sm-8 col-xs-10">

                <div class="row">

                    <div class="col-sm-3 col-xs-6">
                        <fieldset class="rating">
                            <legend>Voto</legend>
                            <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1"></label>
                        </fieldset>
                    </div>

                    <div class="form-group col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="titolo_recensione" placeholder="Titolo recensione" name="titolo_recensione">
                    </div>



                </div>
                <br />
                <div class="row">
                    <div class="form-group col-sm-12 col-xs-12">

                        <textarea class="form-control" id="testo_recensione" rows="10" placeholder="Descrivi la tua esperienza con il cicerone (opzionale)" name="testo_recensione"></textarea>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-sm-2 col-xs-1">
                    </div>
                    <div class="col-sm-4 col-xs-3">
                        <button type="button" class="btn btn-secondary" onclick="location.href='attivitaTurista.php'">Indietro</button>
                    </div>
                    <div class="col-sm-3 col-xs-3">
                        <button type="submit" class="btn btn-primary" name="scrivi_recensione">Scrivi recensione</button>
                    </div>
                    <div class="col-sm-3 col-xs-1">
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-xs-1">
            </div>
        </div>
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('.star').click(function() {
            ajax_call(id, rating);
        });
    </script>

    <script>
        $('.stars a').on('click', function() {
            $('.stars span, .stars a').removeClass('active');

            $(this).addClass('active');
            $('.stars span').addClass('active');
        });
    </script>
</body>

</html>