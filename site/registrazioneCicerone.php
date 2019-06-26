<?php
namespace classi\users;

use classi\utilities\Database;
use classi\utilities\Functions;
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>

<?php
require_once '../classi/users/Cicerone.php';
require_once '../classi/utilities/Database.php';
require_once '../classi/utilities/Functions.php';

// connessione database
$database = new Database();
$link = $database->getConnection();

$cicerone = new Cicerone();

if (isset($_POST["invia_dati"])) {

  $functions = new Functions();

  $cicerone->setName($_POST['nome']);
  $cicerone->setSurname($_POST['cognome']);
  $cicerone->setContact($_POST['mail'], $_POST['telefono']);
  $cicerone->setBirthDate($_POST['data_nascita']);
  $cicerone->setAddress($_POST['nazione'], $_POST['provincia'], $_POST['citta'], $_POST['indirizzo'], $_POST['CAP']);

  // campi password temporanei per il controllo
  $password1 = $_POST['password'];
  $password2 = $_POST['password2'];

  // controllo presenza mail in tabelle ciceroni e turista
  $query_mail_ciceroni = "SELECT * from ciceroni WHERE mail = '{$cicerone->getContact()->getMail()}'";
  $result_mail_ciceroni = mysqli_query($link, $query_mail_ciceroni) or die("Errore di registrazione!");

  $query_mail_turisti = "SELECT * from turista WHERE mail = '{$cicerone->getContact()->getMail()}'";
  $result_mail_turisti = mysqli_query($link, $query_mail_turisti) or die("Errore di registrazione!");

  if (mysqli_num_rows($result_mail_ciceroni) == 1 || mysqli_num_rows($result_mail_turisti) == 1) {
    echo "<div class='alert alert-danger' role='alert'>
					<a href='formRegistrazione.html' class='alert-link'>Esiste già un account con questa mail! Click per riprovare</a>
				</div>";
  } else {

    //controllo presenza numero telefono in tabelle ciceroni e turista
    $query_phone_ciceroni = "SELECT *from ciceroni WHERE telefono = '{$cicerone->getContact()->getPhone_num()}'";
    $result_phone_ciceroni = mysqli_query($link, $query_phone_ciceroni) or die("Errore di registrazione!");

    $query_phone_turisti = "SELECT *from turista WHERE telefono = '{$cicerone->getContact()->getPhone_num()}'";
    $result_phone_turisti = mysqli_query($link, $query_phone_turisti) or die("Errore di registrazione!");

    if (mysqli_num_rows($result_phone_ciceroni) == 1 || mysqli_num_rows($result_phone_turisti) == 1) {
      echo "<div class='alert alert-danger' role='alert'>
					<a href='formRegistrazione.html' class='alert-link'>Esiste già un account con questo numero di telefono! Click per riprovare</a>
				</div>";
    } else {

      // controllo campi vuoti
      if (
        $cicerone->getName() == "" || $cicerone->getSurname() == "" || $password1 == "" ||
        $password2 == "" || $cicerone->getContact()->getMail() == "" || $cicerone->getContact()->getPhone_num() == "" || $cicerone->getBirthDate() == "" ||
        $cicerone->getAddress()->getNation() == "" || $cicerone->getAddress()->getCounty() == "" || $cicerone->getAddress()->getCity() == "" ||
        $cicerone->getAddress()->getStreet() == "" || $cicerone->getAddress()->getCAP() == ""
      ) {

        echo "<div class='alert alert-danger' role='alert'>
          <a href='formRegistrazione.html' class='alert-link'>Non tutti i campi sono stati compilati! Click per riprovare</a>
        </div>";
      } elseif (strcmp($password1, $password2) != 0) {

        echo "<div class='alert alert-danger' role='alert'>
          <a href='formRegistrazione.html' class='alert-link'>Le password non corrispondono! Click per riprovare</a>
        </div>";
      } else {
        
        $cicerone->setBirthDate($functions->writeDateDb($_POST['data_nascita']));
        $cicerone->setPassword(sha1(md5(sha1($password1))));

        $query = "INSERT into {$database->getCicerone_table()} values ('{$cicerone->getName()}', '{$cicerone->getSurname()}','{$cicerone->getBirthDate()}','{$cicerone->getContact()->getPhone_num()}','{$cicerone->getContact()->getMail()}',
                            '{$cicerone->getPassword()}', '{$cicerone->getAddress()->getNation()}', '{$cicerone->getAddress()->getCounty()}', '{$cicerone->getAddress()->getCity()}',
                            '{$cicerone->getAddress()->getStreet()}', '{$cicerone->getAddress()->getCAP()}', 'null', 'null')";

        $result = mysqli_query($link, $query) or die("Errore di registrazione!");

        if ($result) {
          echo "<div class='alert alert-success' role='alert'>
            <a href='homepage.html' class='alert-link'>Registrazione effettuata con successo! Click per effettuare il login</a>
          </div>";
        }
      }
    }// end else controllo presenza numero di telefono
  } //end else controllo presenza mail
  mysqli_close($link);
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
