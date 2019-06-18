<<<<<<< HEAD
=======
<?php 
namespace classi\users;
use classi\utilities\Database;
?>
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
<link rel="stylesheet" href="css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"
	type="text/javascript"></script>

<?php
<<<<<<< HEAD
namespace classi\users;

// connessione database
$link = mysqli_connect("localhost", "root", "root", "cicerone") or die("Errore connessione!");

$cicerone = new Cicerone();
if (isset($_POST["invia_dati"])) {

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $telefono = $_POST['telefono'];
    $mail = $_POST['mail'];
    $passwordget = $_POST['password'];
    $password2 = $_POST['password2'];
    $citta = $_POST['citta'];
    $lingua = $_POST['lingua'];
    $lingua2 = $_POST['lingua2'];
    $lingua3 = $_POST['lingua3'];

    if ($nome == "" || $cognome == "" || $passwordget == "" || $password2 == "" || $mail == "" || $citta == "" || $telefono == "" || $lingua == "") {
        echo "<div class='alert alert-danger' role='alert'>
          <a href='formRegistrazione.html' class='alert-link'>Non tutti i campi sono stati compilati! Click per riprovare</a>
        </div>";
    } elseif ($passwordget != $password2) {
=======
require_once '../classi/users/Cicerone.php';
require_once '../classi/utilities/Database.php';

// connessione database
$database = new Database();
$link = $database->getConnetion();

$cicerone = new Cicerone();

if (isset($_POST["invia_dati"])) {

    $cicerone->setName($_POST['nome']);
    $cicerone->setSurname($_POST['cognome']);
    $cicerone->setContact($_POST['mail'], $_POST['telefono']);
    $cicerone->setAddress($_POST['paese'], $_POST['provincia'], $_POST['citta'], $_POST['indirizzo'], $_POST['CAP']);
    
    // campi password temporanei per il controllo
    $password1 = $_POST['password'];
    $password2 = $_POST['password2'];
    
    // controllo campi vuoti
    if ($cicerone->getName() == "" || $cicerone->getSurname() == ""|| $password1 == "" ||
        $password2 == "" || $cicerone->getContact()->getEmail() == ""|| $cicerone->getContact()->getPhone_num() == "" ||
        $cicerone->getAddress()->getNation() == "" || $cicerone->getAddress()->getCounty() == "" || $cicerone->getAddress()->getCity() == "" ||
        $cicerone->getAddress()->getStreet() == ""|| $cicerone->getAddress()->getCAP() == ""){
       
        echo "<div class='alert alert-danger' role='alert'>
          <a href='formRegistrazione.html' class='alert-link'>Non tutti i campi sono stati compilati! Click per riprovare</a>
        </div>";
        
    } elseif (strcmp($password1, $password2) != 0) {
        
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
        echo "<div class='alert alert-danger' role='alert'>
          <a href='formRegistrazione.html' class='alert-link'>Le password non corrispondono! Click per riprovare</a>
        </div>";
    } else {
<<<<<<< HEAD
        $password = sha1(md5(sha1($passwordget)));
        $query = "INSERT INTO cicero(nome, cognome, telefono, mail, password, citta, lingua)VALUES('$nome', '$cognome','$telefono','$mail','$password', '$citta','$lingua')";
        $result = mysqli_query($link, $query) or die("Errore di registrazione! Controlla di aver compilato tutti i campi.");
        if ($lingua2 != "") {
            $query2 = "UPDATE cicero SET lingua2 = '$lingua2' WHERE mail = '$mail'";
            $result2 = mysqli_query($link, $query2);
        }
        if ($lingua3 != "") {
            $query3 = "UPDATE cicero SET lingua3 = '$lingua3' WHERE mail = '$mail'";
            $result3 = mysqli_query($link, $query3);
        }
=======
        
        $cicerone->setPassword(sha1(md5(sha1($password1)))); 
        
        $query = "INSERT into {$database->getCicerone_table()} values ('{$cicerone->getName()}', '{$cicerone->getSurname()}','2019-2-27','{$cicerone->getContact()->getPhone_num()}','{$cicerone->getContact()->getEmail()}',
                            '{$cicerone->getPassword()}', '{$cicerone->getAddress()->getNation()}', '{$cicerone->getAddress()->getCounty()}', '{$cicerone->getAddress()->getCity()}',
                            '{$cicerone->getAddress()->getStreet()}', '{$cicerone->getAddress()->getCAP()}')";
        
        $result = mysqli_query($link, $query) or die("Errore di registrazione!");

>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
        if ($result) {
            echo "<div class='alert alert-success' role='alert'>
            <a href='cicerone.php' class='alert-link'>Registrazione effettuata con successo! Click per entrare</a>
          </div>";
        }
    }
    mysqli_close($link);
}
?>

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
