<?php
namespace classi\users;

use classi\utilities\Database;
use classi\utilities\Functions;
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>

<?php
require_once '../classi/users/Turista.php';
require_once '../classi/utilities/Database.php';
require_once '../classi/utilities/Functions.php';

// connessione database
$database = new Database();
$link = $database->getConnection();

$turista = new Turista();

if (isset($_POST["invia_dati_turista"])) {

  $functions = new Functions();

  $turista->setName($_POST['nome']);
  $turista->setSurname($_POST['cognome']);
  $turista->setContact($_POST['mail'], $_POST['telefono']);
  $turista->setBirthDate($_POST['data_nascita']);
  $turista->setAddress($_POST['nazione'], $_POST['provincia'], $_POST['citta'], $_POST['indirizzo'], $_POST['CAP']);

  // campi password temporanei per il controllo
  $password1 = $_POST['password'];
  $password2 = $_POST['password2'];

  // controllo presenza mail in tabelle ciceroni e turista
  $query_mail_ciceroni = "SELECT * from ciceroni WHERE mail = '{$turista->getContact()->getMail()}'";
  $result_mail_ciceroni = mysqli_query($link, $query_mail_ciceroni) or die("Errore di registrazione!");

  $query_mail_turisti = "SELECT * from turista WHERE mail = '{$turista->getContact()->getMail()}'";
  $result_mail_turisti = mysqli_query($link, $query_mail_turisti) or die("Errore di registrazione!");

  if (mysqli_num_rows($result_mail_ciceroni) == 1 || mysqli_num_rows($result_mail_turisti) == 1) {
    echo "<div class='alert alert-danger' role='alert'>
        <a href='formRegistrazione.html' class='alert-link'>Esiste già un account con questa mail! Click per riprovare</a>
      </div>";
  } else {

    //controllo presenza numero telefono in tabelle ciceroni e turista
    $query_phone_ciceroni = "SELECT * from ciceroni WHERE telefono = '{$turista->getContact()->getPhone_num()}'";
    $result_phone_ciceroni = mysqli_query($link, $query_phone_ciceroni) or die("Errore di registrazione!");

    $query_phone_turisti = "SELECT * from turista WHERE telefono = '{$turista->getContact()->getPhone_num()}'";
    $result_phone_turisti = mysqli_query($link, $query_phone_turisti) or die("Errore di registrazione!");

    if (mysqli_num_rows($result_phone_ciceroni) == 1 || mysqli_num_rows($result_phone_turisti) == 1) {
      echo "<div class='alert alert-danger' role='alert'>
        <a href='formRegistrazione.html' class='alert-link'>Esiste già un account con questo numero di telefono! Click per riprovare</a>
      </div>";
    } else {

      // controllo campi vuoti
      if (
        $turista->getName() == "" || $turista->getSurname() == "" || $password1 == "" ||
        $password2 == "" || $turista->getContact()->getMail() == "" || $turista->getContact()->getPhone_num() == "" || $turista->getBirthDate() == "" ||
        $turista->getAddress()->getNation() == "" || $turista->getAddress()->getCounty() == "" || $turista->getAddress()->getCity() == "" ||
        $turista->getAddress()->getStreet() == "" || $turista->getAddress()->getCAP() == ""
      ) {

        echo "<div class='alert alert-danger' role='alert'>
          <a href='formRegistrazioneTurista.html' class='alert-link'>Non tutti i campi sono stati compilati! Click per riprovare</a>
        </div>";
      } elseif (strcmp($password1, $password2) != 0) { // controllo password reinserita correttamente

        echo "<div class='alert alert-danger' role='alert'>
          <a href='formRegistrazioneTurista.html' class='alert-link'>Le password non corrispondono! Click per riprovare</a>
        </div>";
      } else {

        $turista->setBirthDate($functions->writeDateDb($_POST['data_nascita']));
        $turista->setPassword(sha1(md5(sha1($password1))));

        $query = "INSERT into {$database->getTurista_table()} values ('{$turista->getName()}', '{$turista->getSurname()}','{$turista->getBirthDate()}','{$turista->getContact()->getPhone_num()}','{$turista->getContact()->getMail()}',
                            '{$turista->getPassword()}', '{$turista->getAddress()->getNation()}', '{$turista->getAddress()->getCounty()}', '{$turista->getAddress()->getCity()}',
                            '{$turista->getAddress()->getStreet()}', '{$turista->getAddress()->getCAP()}')";

        $result = mysqli_query($link, $query) or die("Errore di registrazione!");

        if ($result) {
          echo "<div class='alert alert-success' role='alert'>
            <a href='homepage.html' class='alert-link'>Registrazione effettuata con successo! Click per effettuare il login</a>
          </div>";
        }
      }
      mysqli_close($link);
    }//end else controllo presenza numero di telefono
  }//end else controllo presenza mail
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>