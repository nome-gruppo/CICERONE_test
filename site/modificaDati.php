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

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>

<?php

$utente = $_SESSION['utente'];
$costo_premium = $_SESSION['costo_premium'];

// connessione database
$database = new Database();
$link = $database->getConnection();

$functions = new Functions();
$functions->stampaNavbarCicerone($utente->getName());
if (isset($_POST["modifica_dati"])) {

    $telefono_ok = true;

    if (trim($_POST['telefono']) != "") {
        $telefono = trim($_POST['telefono']);
        //controllo presenza numero telefono in tabelle ciceroni e turista
        $query_phone_ciceroni = "SELECT *from ciceroni WHERE telefono = '$telefono'";
        $result_phone_ciceroni = mysqli_query($link, $query_phone_ciceroni) or die("Errore di registrazione!");

        $query_phone_turisti = "SELECT *from turista WHERE telefono = '$telefono'";
        $result_phone_turisti = mysqli_query($link, $query_phone_turisti) or die("Errore di registrazione!");

        if (mysqli_num_rows($result_phone_ciceroni) == 1 || mysqli_num_rows($result_phone_turisti) == 1) {
            $telefono_ok = false;
            echo "<div class='alert alert-danger' role='alert'>
                     <a href='ilMioProfilo.php' class='alert-link'>Esiste già un account con questo numero di telefono! Click per riprovare</a>
                 </div>";
        } else {
            $utente->setContact($utente->getContact()->getMail(), trim($_POST['telefono']));
        }
    }

    if ($telefono_ok == true) {
        if (trim($_POST['nome']) != "") {
            $utente->setName($_POST['nome']);
        }

        if (trim($_POST['cognome']) != "") {
            $utente->setSurname($_POST['cognome']);
        }

        if ($_POST['data_nascita'] != "") {
            $utente->setBirthDate($functions->writeDateDb($_POST['data_nascita']));
        }

        if ($_POST['nazione'] != "") {
            $utente->setAddress($_POST['nazione'], $utente->getAddress()->getCounty(), $utente->getAddress()->getCity(), $utente->getAddress()->getStreet(), $utente->getAddress()->getCAP());
        }

        if (trim($_POST['provincia']) != "") {
            $utente->setAddress($utente->getAddress()->getNation(), $_POST['provincia'], $utente->getAddress()->getCity(), $utente->getAddress()->getStreet(), $utente->getAddress()->getCAP());
        }

        if (trim($_POST['citta']) != "") {
            $utente->setAddress($utente->getAddress()->getNation(), $utente->getAddress()->getCounty(), $_POST['citta'], $utente->getAddress()->getStreet(), $utente->getAddress()->getCAP());
        }

        if (trim($_POST['indirizzo']) != "") {
            $utente->setAddress($utente->getAddress()->getNation(), $utente->getAddress()->getCounty(), $utente->getAddress()->getCity(), $_POST['indirizzo'], $utente->getAddress()->getCAP());
        }

        if (trim($_POST['CAP']) != "") {
            $utente->setAddress($utente->getAddress()->getNation(), $utente->getAddress()->getCounty(), $utente->getAddress()->getCity(),  $utente->getAddress()->getStreet(), $_POST['CAP']);
        }


        $password_ok = true;
        $passcript = sha1(md5(sha1($_POST['vecchia_password'])));

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
                    $password_ok = false;
                    echo "<div class='alert alert-danger' role='alert'>
                    <a href='ilMioProfilo.php' class='alert-link'>Compila tutti i campi password! Click per riprovare</a>
                    </div>";

                    //altrimenti i nuovi campi non coincidono
                } elseif (sha1(md5(sha1($_POST['vecchia_password']))) != $utente->getPassword()) {
                    $password_ok = false;
                    echo "<div class='alert alert-danger' role='alert'>
                    <a href='ilMioProfilo.php' class='alert-link'>Campo vecchia password errato! Click per riprovare</a>
                    </div>";
                } else {
                    $password_ok = false;
                    echo "<div class='alert alert-danger' role='alert'>
                    <a href='ilMioProfilo.php' class='alert-link'>Le password non corrispondono! Click per riprovare</a>
                    </div>";
                }
                //altrimenti non è stato compilato qualche campo nuova password
            } else {
                $password_ok = false;
                echo "<div class='alert alert-danger' role='alert'>
                    <a href='ilMioProfilo.php' class='alert-link'>Compila tutti i campi password! Click per riprovare</a>
                    </div>";
            }
        }


        if ($password_ok) {
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
} //end if modifica dati

if (isset($_POST["elimina_account"])) {

    if ($utente instanceof Cicerone) {

        $query = "DELETE from ciceroni where id_cicerone = '{$utente->getId()}'";
    } else {
        $query = "DELETE from turista where id_turista = '{$utente->getId()}'";
    }

    $result = mysqli_query($link, $query) or die("Errore eliminazione account!");

    if ($result) {
        echo "<div class='alert alert-success' role='alert'>
                <a href='logout.php' class='alert-link'>Il tuo account è stato eliminato correttamente</a>
                </div>";
    }
} //end if elimina account

if (isset($_POST["disdici_premium"])) {

    $array_attivita = array();

    $query = "SELECT * from attivita";
    $result = mysqli_query($link, $query) or die("Errore lettura attività");

    //carico le attività del cicerone su un'array
    while ($row = mysqli_fetch_array($result)) {

        if ($row['id_cicerone'] == $utente->getId()) {
            $attivita = new Activity($row['id_cicerone'], $row['titolo'], $row['citta'], $row['costo'], $row['descrizione'], $row['lingua'], $row['data_attivita']);
            $attivita->setIdAttivita($row['id_attivita']);
            $array_attivita[] = $attivita;
        }
    }

    //creo un array formato dalle attività future
    $array_attivita_future = array();

    foreach ($array_attivita as $item) {
        if (is_object($item) && $item instanceof Activity) {
            if ($item->getData >= date("Y-m-d")) {
                $array_attivita_future[] = $item;
            }
        }
    }

    $errore_eliminazione = false;

    //elimino le prime 3 attività dall'array e cancello dal database le attività presenti nell'array
    if (count($array_attivita_future) > 3) {
        unset($array_attivita_future[0]);
        unset($array_attivita_future[1]);
        unset($array_attivita_future[2]);
        $array_attivita_future = array_values($array_attivita_future);
        $array_dim = count($array_attivita_future);

        //eliminazione attività future dal database
        for ($i = 0; $i < $array_dim; $i++) {
            $query = "DELETE from attivita WHERE id_attivita ='{$array_attivita_future[$i]->getIdAttivita()}'";
            $result = mysqli_query($link, $query) or die("Errore eliminazione attività");

            if (!$result) {
                $errore_eliminazione = true;
            }
        }
    }

    //modifica data_premium del cicerone
    $query = "UPDATE ciceroni SET data_premium = '0000-00-00' WHERE id_cicerone = '{$utente->getId()}'";
    $result = mysqli_query($link, $query) or die("Errore modifica data!");

    if (($errore_eliminazione == false) && $result) {
        echo "<div class='alert alert-success' role='alert'>
                <a href='cicerone.php' class='alert-link'>Le attività sono state eliminate. Non sei più un Cicerone premium</a>
                </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                <a href='cicerone.php' class='alert-link'>La tua disdetta non è andata a buon fine</a>
                </div>";
    }
} //end if disdici premium

if (isset($_POST["diventa_premium"])) {

    echo '<form action="pagamenti.php" method="post">
            <!-- container-->
            <div class="container-fluid">
                <br /><br /><br /><br />
                <div class="col-sm-3 col-xs-2">
                </div>

                <div class="col-sm-6 col-xs-8">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#carta" data-toggle="tab"><strong>Carta di credito</strong></a>
                        </li>
                        <li><a href="#paypal" data-toggle="tab"><strong>PayPal</strong></a>
                        </li>
                    </ul>

                    <!--tab-->
                    <div class="tab-content clearfix">
                        <!-- Carta -->
                        <div class="tab-pane active" id="carta">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-body">
                                    Carte di credito accettate<br>
                                    <img src="images\cardLogo.png">
                                    <br /><br />

                                    <div class="row">
                                        <strong>&nbsp&nbsp&nbsp&nbspImporto €' . $costo_premium . '</strong>
                                    </div>
                                    <br />

                                    <div class="row">
                                        <div class="col-sm-6 col-xs-8">
                                            <input type="text" class="form-control" placeholder="Numero carta" name="num_carta">
                                        </div>
                                        <br /><br />
                                        <div class="col-sm-3 col-xs-3">
                                            <input type="text" class="form-control" placeholder="CVV" name="cvv_code">
                                        </div>
                                        <br /><br />
                                        <div class="col-sm-8 col-xs-8">
                                        </div>
                                        <div class="col-sm-4 col-xs-4">
                                            <button type="submit" class="btn btn-primary" name="pagamento_carta">Procedi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fine carta -->


                        <!-- paypal -->
                        <div class="tab-pane" id="paypal">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-body">
                                    <img src="images\paypalLogo.png">
                                    <br />

                                    <div class="row">
                                        <strong>&nbsp&nbsp&nbsp&nbspImporto €' . $costo_premium . '</strong>
                                    </div>
                                    <br />

                                    <div class="row">
                                        <div class="col-sm-6 col-xs-8">
                                            <input type="email" class="form-control" placeholder="Email PayPal" name="mail_paypal">
                                        </div>
                                        <br /><br />
                                        <br /><br />
                                        <div class="col-sm-8 col-xs-8">
                                        </div>
                                        <div class="col-sm-4 col-xs-4">
                                            <button type="submit" class="btn btn-primary" name="pagamento_paypal">Procedi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fine paypal -->
                    </div>
                    <!-- Fine tab-->

                </div>
                <!--end col-->

                <div class="col-sm-3 col-xs-2">
                </div>
            </div>
            <!--fine container-->
        </form>';
} //end if diventa premium

mysqli_close($link);
?>
