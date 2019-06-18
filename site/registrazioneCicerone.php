<link rel="stylesheet" href="css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"
	type="text/javascript"></script>

<?php
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
        echo "<div class='alert alert-danger' role='alert'>
          <a href='formRegistrazione.html' class='alert-link'>Le password non corrispondono! Click per riprovare</a>
        </div>";
    } else {
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
