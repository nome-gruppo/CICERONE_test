<?php
namespace classi\users;

use classi\utilities\Database;
use classi\utilities\Functions;
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"
	type="text/javascript"></script>

<?php
require_once '../classi/users/Turista.php';
require_once '../classi/utilities/Database.php';
require_once '../classi/utilities/Functions.php';

// connessione database
$database = new Database();
$link = $database->getConnection();

$turista = new Turista(); // classi\users\Turista()

if ((isset($_POST["invia_dati_turista"]))) {

    $functions = new Functions();

    $turista->setName($_POST['nome']);
    $turista->setSurname($_POST['cognome']);
    $turista->setContact($_POST['mail'], $_POST['telefono']);
    $turista->setBirthDate($functions->StringToDate($_POST['data_nascita']));
    $turista->setAddress($_POST['paese'], $_POST['provincia'], $_POST['citta'], $_POST['indirizzo'], $_POST['CAP']);

    // campi password temporanei per il controllo
    $password1 = $_POST['password'];
    $password2 = $_POST['password2'];

    // controllo campi vuoti
    if ($turista->getName() == "" || $turista->getSurname() == "" || $password1 == "" || $password2 == "" || $turista->getContact()->getEmail() == "" ||
		    $turista->getContact()->getPhone_num() == "" || $turista->getBirthDate() == NULL || $turista->getAddress()->getNation() == "" || $turista->getAddress()->getCounty() == ""
				|| $turista->getAddress()->getCity() == "" || $turista->getAddress()->getStreet() == "" || $turista->getAddress()->getCAP() == "") {

        echo "<div class='alert alert-danger' role='alert'>
          <a href='formRegistrazioneTurista.html' class='alert-link'>Non tutti i campi sono stati compilati! Click per riprovare</a>
        </div>";
    } elseif (strcmp($password1, $password2) != 0) { // controllo password reinserita correttamente

        echo "<div class='alert alert-danger' role='alert'>
          <a href='formRegistrazioneTurista.html' class='alert-link'>Le password non corrispondono! Click per riprovare</a>
        </div>";
    } else {

        $turista->setPassword(sha1(md5(sha1($password1))));

        $query = "INSERT into {$database->getTurista_table()} values ('{$turista->getName()}', '{$turista->getSurname()}','{$functions->writeDateDb($turista->getBirthDate())}','{$turista->getContact()->getPhone_num()}','{$turista->getContact()->getEmail()}',
                            '{$turista->getPassword()}', '{$turista->getAddress()->getNation()}', '{$turista->getAddress()->getCounty()}', '{$turista->getAddress()->getCity()}',
                            '{$turista->getAddress()->getStreet()}', '{$turista->getAddress()->getCAP()}')";

        $result = mysqli_query($link, $query) or die("Errore di registrazione!");

        if ($result) {
            echo "<div class='alert alert-success' role='alert'>
            <a href='turista.php' class='alert-link'>Registrazione effettuata con successo! Click per entrare</a>
          </div>";
        }
    }
    mysqli_close($link);
}
?>

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
