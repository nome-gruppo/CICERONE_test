<?php
namespace classi\users;

use classi\utilities\Database;
use classi\utilities\Functions;
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>

<?php
require_once '../classi/users/User.php';
require_once '../classi/utilities/Database.php';
require_once '../classi/utilities/Functions.php';

session_start();

$utente = $_SESSION['utente'];

// connessione database
$database = new Database();
$link = $database->getConnection();



if (isset($_POST["invia_dati"])) {

    $functions = new Functions();

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

        if ((($_POST['password'] != "") || ($_POST['ripeti_password'] != "")) || ($_POST['password'] != $_POST['ripeti_password'])) {
            echo "<div class='alert alert-danger' role='alert'>
            <a href='ilMioProfilo' class='alert-link'>Le password non corrispondono! Click per riprovare</a>
          </div>";
        } else {
            $utente->setPassword(sha1(md5(sha1($_POST['password']))));
        }

        if($utente instanceof Cicerone){
        
        $query = "UPDATE 'ciceroni' SET nome = '{$utente->getName()}', cognome = '{$utente->getSurname()}', data_nascita ='{$utente->getBirthDate()}',telefono = '{$utente->getContact()->getPhone_num()}',  password ='{$utente->getPassword()}', nazione = '{$utente->getAddress()->getNation()}',
                provincia = '{$utente->getAddress()->getCounty()}', citta = '{$utente->getAddress()->getCity()}', indirizzo = '{$utente->getAddress()->getStreet()}', cap ='{$utente->getAddress()->getCAP()}' where mail = '{$utente->getContact()->getMail()}')";
        }else{
            $query = "UPDATE 'turista' SET nome = '{$utente->getName()}', cognome = '{$utente->getSurname()}', data_nascita ='{$utente->getBirthDate()}',telefono = '{$utente->getContact()->getPhone_num()}',  password ='{$utente->getPassword()}', nazione = '{$utente->getAddress()->getNation()}',
                provincia = '{$utente->getAddress()->getCounty()}', citta = '{$utente->getAddress()->getCity()}', indirizzo = '{$utente->getAddress()->getStreet()}', cap ='{$utente->getAddress()->getCAP()}' where mail = '{$utente->getContact()->getMail()}')";
        }

        $result = mysqli_query($link, $query) or die("Errore di registrazione!");

        if ($result) {
            echo "<div class='alert alert-success' role='alert'>
                <a href='ilMioProfilo.php' class='alert-link'>Modifica dati effettuata con successo! Click per effettuare il login</a>
                </div>";
        }
    }

    mysqli_close($link);
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>