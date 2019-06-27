<?php
namespace classi\users;
require_once '..\classi\users\Cicerone.php'; //includo la classe cicerone
require_once '..\classi\utilities\Functions.php';
?>
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
  use classi\users\Cicerone;
  $cicerone=new Cicerone();
  $functions=new Functions();
  $cicerone=$_SESSION['utente'];//prendo l'oggetto turista precedentemente messo in sessione
  $functions->stampaNavbarCicerone($cicerone->getName());
  $url= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
  $id_attivita=(parse_url($url, PHP_URL_QUERY));
  $result=$cicerone->visualizzaPartecipanti($id_attivita);
  $num = mysqli_num_rows($result);
  if($num>0){
    ?>
        <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">Mail</th>
            <th scope="col">Telefono</th>
            <th scope="col">Nazione</th>
          </tr>
        </thead>
        <tbody>
          <?php
              while($riga= mysqli_fetch_assoc($result)){//assoccio il risultato della funzione(record per record)a un array riga fin quando il record non sarà zero e quindi $riga diventerà false
          ?>
                    <tr>
                    <th scope="row"><?php echo $riga['nome'];?></th>
                    <th scope="row"><?php echo $riga['cognome'];?></td>
                    <td><?php echo $riga['mail'];?></td>
                    <td><?php echo $riga['telefono'];?></td>
                    <td><?php echo $riga['nazione'];?></td>
                  </tr>
              <?php
                }
              ?>
        </tbody>
      </table>
    <?php
  }
  else{
    echo "<div class='alert alert-danger' role='alert'>
      <a href='gestioneAttivita.php' class='alert-link'>Non è stata effettuata ancora alcuna prenotazione!</a>
    </div>";
  }

  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
