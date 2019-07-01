<?php
namespace classi\users;
require_once '..\classi\users\Turista.php'; //includo la classe turista
require_once '..\classi\utilities\Functions.php';
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <title>Lista attività</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"/> <!--ottimizza la visione su mobile dello slider-->

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="jquery-1.6.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js" type="text/javascript"></script>

<script> //script per passare come url il numero della prenotazione insieme all'indirizzo pronotazione.php
param_name=new Array();
param_value=new Array();

indirizzo=unescape(String(this.location));
params=indirizzo.split("?");
param=params[1].split("&");

for(i=0;i<param.length;i++){
param_temp=param[i].split("=");
param_name[i]=param_temp[0];
param_value[i]=param_temp[1];

if(isNaN(param_value[i])) eval("var "+param_name[i]+"='"+param_value[i]+"';");
else eval("var "+param[i]+";");
}
</script>
</head>
<body>

<?php
session_start();
use classi\utilities\Functions;

$turista=new Turista();
$turista=$_SESSION['utente'];//prendo l'oggetto turista precedentemente messo in sessione
$functions=new Functions();
$url= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$id_attivita=(parse_url($url, PHP_URL_QUERY));
$result=$turista->confermaAttivita($id_attivita);
if($result){
  echo "<div class='alert alert-success' role='alert'>
    <a href='turista.php' class='alert-link'>Attivita prenotata con successo!E' stata inviata una notifica al cicerone.</a>
  </div>";
}
else{
  echo "<div class='alert alert-danger' role='alert'>
    <a href='turista.php' class='alert-link'>Prenotazione non effettuata!</a>
  </div>";
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
