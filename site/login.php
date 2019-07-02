<?php
namespace classi\users;
use classi\utilities\Database;
require_once '../classi/users/Turista.php';
require_once '../classi/users/Cicerone.php';
require_once '../classi/utilities/Database.php';
define('CAMPO_PASSWORD', 'password');
?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>

<?php

// connessione database
session_start();
$database = new Database();
$link = $database->getConnection();

if (isset($_POST["login"])) {


    $mail = trim($_POST['mail']);
    $password = $_POST[CAMPO_PASSWORD];

    if ($mail == "" || $password == "") {
        echo "Non tutti i campi sono stati compilati";
    } else {

        $password = sha1(md5(sha1($password)));

        // ricerca nela tabella ciceroni
        $query = "SELECT * from ciceroni WHERE mail='$mail' and password='$password'";
        $result = mysqli_query($link, $query) or die("Errore connessione");
        $num = mysqli_num_rows($result);

        if ($num == 1) {

            $utente = new Cicerone();

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $utente->setId($row['id_cicerone']);
            $utente->setName($row['nome']);
            $utente->setSurname($row['cognome']);
            $utente->setBirthDate($row['data_nascita']);
            $utente->setContact($row['mail'], $row['telefono']);
            $utente->setAddress($row['nazione'], $row['provincia'], $row['citta'],$row['indirizzo'], $row['cap']);
            $utente->setPassword($row[CAMPO_PASSWORD]);
            $utente->setValutazione($row['valutazione']);
            $utente->setPremiumDate($row['data_premium']);

            $_SESSION['utente'] = $utente;

            $_SESSION['logged'] = true; // Nella variabile SESSION associo TRUE al valore logged
            mysqli_free_result($result);
            header("location:cicerone.php");

        } elseif ($num == 0) {

            //ricerca nella tabella turista
            $query = "SELECT * from turista WHERE mail='$mail' and password='$password'";
            $result = mysqli_query($link, $query) or die("Errore connessione");
            $num = mysqli_num_rows($result);

            if ($num == 1) {

                $utente = new Turista();

                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $utente->setId($row['id_turista']);
                $utente->setName($row['nome']);
                $utente->setSurname($row['cognome']);
                $utente->setBirthDate($row['data_nascita']);
                $utente->setContact($row['mail'], $row['telefono']);
                $utente->setAddress($row['nazione'], $row['provincia'], $row['citta'],$row['indirizzo'], $row['cap']);
                $utente->setPassword($row[CAMPO_PASSWORD]);

                $_SESSION['utente'] = $utente;

                $_SESSION['logged'] = true; // Nella variabile SESSION associo TRUE al valore logged
                mysqli_free_result($result);
                header("location:turista.php");

            } else {
                echo "<div class='alert alert-danger' role='alert'>
                <a href='homepage.html' class='alert-link'>Controlla di aver inserito correttamente mail e password! Click per riprovare</a>
                </div>";
            }
        }
        mysqli_close($link);
    }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

