<?php
namespace classi\users;

require_once '../classi/users/Cicerone.php';
require_once '../classi/users/Turista.php';
require_once '../classi/utilities/Database.php';
require_once '../classi/utilities/Functions.php';
require_once '../classi/activities/Activity.php';


use classi\utilities\Database;
use classi\utilities\Functions;
use classi\activities\Activity;

session_start();
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>

<?php

$utente = $_SESSION['utente'];

// connessione database
$database = new Database();
$link = $database->getConnection();

$functions = new Functions();

if (isset($_POST["modifica_dati"])) {

    $telefono_ok = true;

    if (trim($_POST['telefono']) != "") {
        //controllo presenza numero telefono in tabelle ciceroni e turista
        $query_phone_ciceroni = "SELECT *from ciceroni WHERE telefono = '{$utente->getContact()->getPhone_num()}'";
        $result_phone_ciceroni = mysqli_query($link, $query_phone_ciceroni) or die("Errore di registrazione!");

        $query_phone_turisti = "SELECT *from turista WHERE telefono = '{$utente->getContact()->getPhone_num()}'";
        $result_phone_turisti = mysqli_query($link, $query_phone_turisti) or die("Errore di registrazione!");

        if (mysqli_num_rows($result_phone_ciceroni) == 1 || mysqli_num_rows($result_phone_turisti) == 1) {
            $telefono_ok = false;
            echo "<div class='alert alert-danger' role='alert'>
                     <a href='ilMioProfilo.php' class='alert-link'>Esiste già un account con questo numero di telefono! Click per riprovare</a>
                 </div>";
        } else {
            $utente->setContact($utente->getMail(), trim($_POST['telefono']));
        }
    }

    if ($telefono_ok == true) {
        if (trim($_POST['nome']) != "") {
            $utente->setName(trim($_POST['nome']));
        }

        if (trim($_POST['cognome']) != "") {
            $utente->setSurname(trim($_POST['cognome']));
        }

        if (trim($_POST['data_nascita']) != "") {
            $utente->setBirthDate($functions->writeDateDb(trim($_POST['data_nascita'])));
        }

        if (trim($_POST['nazione']) != "") {
            $utente->setAddress(trim($_POST['nazione']), $utente->getAddress->getCounty(), $utente->getAddress->getCity(), $utente->getAddress->getStreet(), $utente->getAddress->getCAP());
        }

        if (trim($_POST['provincia']) != "") {
            $utente->setAddress($utente->getAddress->getNation(), trim($_POST['provincia']), $utente->getAddress->getCity(), $utente->getAddress->getStreet(), $utente->getAddress->getCAP());
        }

        if (trim($_POST['citta']) != "") {
            $utente->setAddress($utente->getAddress->getNation(), $utente->getAddress->getCounty(), trim($_POST['citta']), $utente->getAddress->getStreet(), $utente->getAddress->getCAP());
        }

        if (trim($_POST['indirizzo']) != "") {
            $utente->setAddress($utente->getAddress->getNation(), $utente->getAddress->getCounty(), $utente->getAddress->getCity(), trim($_POST['indirizzo']), $utente->getAddress->getCAP());
        }

        if (trim($_POST['CAP']) != "") {
            $utente->setAddress($utente->getAddress->getNation(), $utente->getAddress->getCounty(), $utente->getAddress->getCity(),  $utente->getAddress->getStreet(), trim($_POST['CAP']));
        }



        //se almeno un campo password è stato compilato
        if (($_POST['vecchia_password'] != "") || ($_POST['nuova_password'] != "") || ($_POST['ripeti_password'] != "")) {

            //controlla i campi della nuova password
            if (($_POST['nuova_password'] != "") && ($_POST['ripeti_password'] != "")) {

                //se tutti i campi password sono corretti
                if (((sha1(md5(sha1($_POST['vecchia_password'])))) == $utente->getPassword()) && ($_POST['nuova_password'] == $_POST['ripeti_password'])) {

                    //cambia password
                    $utente->setPassword(sha1(md5(sha1($_POST['nuova_password']))));

                    //altrimenti se non è stata inserita la vecchia password
                } elseif ($_POST['vecchia_password'] == "") {
                    echo "<div class='alert alert-danger' role='alert'>
                    <a href='ilMioProfilo.php' class='alert-link'>Compila tutti i campi password! Click per riprovare</a>
                    </div>";

                    //altrimenti i nuovi campi non coincidono   
                } elseif(sha1(md5(sha1($_POST['vecchia_password']))) != $utente->getPassword()) {
                    echo "<div class='alert alert-danger' role='alert'>
                    <a href='ilMioProfilo.php' class='alert-link'>Campo vecchia password errato! Click per riprovare</a>
                    </div>";
                }else{
                    echo "<div class='alert alert-danger' role='alert'>
                    <a href='ilMioProfilo.php' class='alert-link'>Le password non corrispondono! Click per riprovare</a>
                    </div>";
                }
                //altrimenti non è stato compilato qualche campo nuova password
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                    <a href='ilMioProfilo.php' class='alert-link'>Compila tutti i campi password! Click per riprovare</a>
                    </div>";
            }
        }



        if ($utente instanceof Cicerone) {

            $query = "UPDATE ciceroni SET nome = '{$utente->getName()}', cognome = '{$utente->getSurname()}', data_nascita ='{$utente->getBirthDate()}',telefono = '{$utente->getContact()->getPhone_num()}',  password ='{$utente->getPassword()}', nazione = '{$utente->getAddress()->getNation()}',
               provincia = '{$utente->getAddress()->getCounty()}', citta = '{$utente->getAddress()->getCity()}', indirizzo = '{$utente->getAddress()->getStreet()}', cap ='{$utente->getAddress()->getCAP()}' WHERE id_cicerone = '{$utente->getId()}'";
        } else {
            $query = "UPDATE turista SET nome = '{$utente->getName()}', cognome = '{$utente->getSurname()}', data_nascita ='{$utente->getBirthDate()}',telefono = '{$utente->getContact()->getPhone_num()}',  password ='{$utente->getPassword()}', nazione = '{$utente->getAddress()->getNation()}',
                provincia = '{$utente->getAddress()->getCounty()}', citta = '{$utente->getAddress()->getCity()}', indirizzo = '{$utente->getAddress()->getStreet()}', cap ='{$utente->getAddress()->getCAP()}' where id_turista = '{$utente->getId()}'";
        }

        $result = mysqli_query($link, $query) or die("Errore nella modifica dei dati!");

        if ($result) {
            echo "<div class='alert alert-success' role='alert'>
                <a href='ilMioProfilo.php' class='alert-link'>Modifica dati effettuata con successo!</a>
                </div>";
        }
    }
}

if (isset($_POST["elimina_account"])) {

    if ($utente instanceof Cicerone) {

        $query = "DELETE from ciceroni where id_cicerone = '{$utente->getId()}'";
    } else {
        $query = "DELETE from turista where id_turista = '{$utente->getId()}'";
    }

    $result = mysqli_query($link, $query) or die("Errore eliminazione account!");

    if ($result) {
        echo "<div class='alert alert-success' role='alert'>
                <a href='homepage.html' class='alert-link'>Il tuo account è stato eliminato correttamente</a>
                </div>";
    }
}

if (isset($_POST["disdici_premium"])) {

    $array_attivita = array();

    $query = "SELECT * from attivita";
    $result = mysqli_query($link, $query) or die("Errore lettura attività");

    //carico le attività del cicerone su un'array
    while ($row = mysqli_fetch_array($result)) {

        if ($row['id_cicerone'] == $utente->getId()) {
            $attivita = new Activity($row['id_cicerone'], $row['citta'], $row['costo'], $row['descrizione'], $row['lingua'], $row['data_attivita']);
            $attivita->setIdAttivita($row['id_attivita']);
            $array_attivita[] = $attivita;
        }
    }

    //creo un array formato dalle attività future
    $array_attivita_future = array();

    foreach ($array_attivita as $item) {
        if (is_object($item) && $item instanceof Activity) {
            if ($functions->dateDiff($item->getData(),date("Y-m-d"), "%a") >= 0) {
                $array_attivita_future[] = $item;
            }
        }
    }


    //elimino le prime 3 attività dall'array e cancello dal database le attività presenti nell'array
    if (count($array_attivita_future) > 3) {
        unset($array_attivita_future[0]);
        unset($array_attivita_future[1]);
        unset($array_attivita_future[2]);
        $array_attivita_future = array_values($array_attivita_future);
        $array_dim = count($array_attivita_future);

        $errore_eliminazione = false;

        for ($i = 0; $i < $array_dim; $i++) {
            $query = "DELETE from attivita WHERE id_attivita ='{$array_attivita_future[$i]->getIdAttivita()}'";
            $result = mysqli_query($link, $query) or die("Errore eliminazione attività");

            if (!$result) {
                $errore_eliminazione = true;
            }
        }

        //modifica data_premium del cicerone
        $query = "UPDATE ciceroni SET data_premium = '0000-00-00' WHERE id_cicerone = '{$utente->getId()}'";
        $result = mysqli_query($link, $query) or die("Errore modifica data!");

        if (($errore_eliminazione == false) && $result) {
            echo "<div class='alert alert-success' role='alert'>
                    <a href='homepage.html' class='alert-link'>Le attività sono state eliminate</a>
                    </div>";
        } else {
            echo "<div class='alert alert-success' role='alert'>
                    <a href='homepage.html' class='alert-link'>Non tutte le tue attività sono state eliminate correttamente</a>
                    </div>";
        }
    }
}

if (isset($_POST["diventa_premium"])) { }

mysqli_close($link);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>