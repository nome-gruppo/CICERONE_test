<?php
namespace classi\users;
require_once '..\classi\users\Turista.php'; //includo la classe turista
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
  </head>
  <body>


<?php
session_start();
use classi\utilities\Functions;

$turista=new Turista();
$turista=$_SESSION['utente'];//prendo l'oggetto turista precedentemente messo in sessione
$functions=new Functions();
  if(isset($_POST["ricercaAttivita"])){//se l'utente clicca su ricerca
    $citta=$_POST['citta'];
    $lingua=$_POST['lingua'];
    $data=($functions->writeDateDb( $_POST['data']));
    $result=$turista->searchActivity($citta, $lingua, $data);//chiamo la funzione cercaAttivita
    $num=mysqli_num_rows($result);//conto il numero di righe restituite dalla funzione
  if($num>0){
    ?>
        <table class="table">
        <thead>
          <tr>
            <th scope="col">Citta</th>
            <th scope="col">Data</th>
            <th scope="col">Nome Cicerone</th>
            <th scope="col">Cognome</th>
            <th scope="col">Costo €</th>
            <th scope="col">Lingua</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Prenota</th>
          </tr>
        </thead>
        <tbody>
          <?php
              while($riga= mysqli_fetch_assoc($result)){//assoccio il risultato della funzione(record per record)a un array riga fin quando il record non sarà zero e quindi $riga diventerà false
          ?>
                    <tr>
                    <th scope="row"><?php echo $riga['citta'];//stampo il campo citta dell'array $riga ?></th>
                    <td><?php echo $riga['data_attivita'];?></td>
                    <td><?php echo $riga['nomeCicerone'];?></td>
                    <td><?php echo $riga['cognomeCicerone'];?></td>
                    <td><?php echo $riga['costo'];?></td>
                    <td><?php echo $riga['lingua'];?></td>
                    <td><?php echo $riga['descrizione'];?></td>
                    <td><a href="prenotazione.php?<?php echo $riga['id_attivita'];?>">PRENOTA</a></td>
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
      <a href='turista.php' class='alert-link'>Nessun risultato trovato!</a>
    </div>";
  }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
