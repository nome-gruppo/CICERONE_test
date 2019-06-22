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

  </head>
  <body>


<?php
session_start();
use classi\utilities\Functions;
use classi\users\Turista;
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
              $i=0;
              while($riga= mysqli_fetch_assoc($result)){//assoccio il risultato della funzione(record per record)a un array riga fin quando il record non sarà zero e quindi $riga diventerà false
              $i++;
          ?>
                    <tr>
                    <th scope="row"><?php echo $riga['citta'];//stampo il campo citta dell'array $riga ?></th>
                    <td><?php echo $riga['data_attivita'];?></td>
                    <td><?php echo $riga['nomeCicerone'];?></td>
                    <td><?php echo $riga['cognomeCicerone'];?></td>
                    <td><?php echo $riga['costo'];?></td>
                    <td><?php echo $riga['lingua'];?></td>
                    <td><?php echo $riga['descrizione'];?></td>
                    <td><div class="input-group">
                      <span class="input-group-addon">
                        <input type="checkbox" aria-label="..." data-toggle="modal" data-target=".bs-example-modal-lg" onclick="<?php $_SESSION['id']=$riga['id_attivita'];?>">

                      </span>
                    </div></td>
                  </tr>
              <?php
                }
              ?>
        </tbody>
      </table>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <h1>Sicuro di voler prenotare l'attivita selezionata?</h1>
    </br></br>
    <div class="row">
    <div class="col-lg-6">
    <a href="prenotazione.php"><button type="submit" class="btn btn-primary">SI   <span class="glyphicon glyphicon-ok-circle"></span></button></a>
  </div>
  <div class="col-lg-6">
    <button type="submit" class="btn btn-primary">NO   <span class="glyphicon glyphicon-remove-circle"></span></button>
  </div>
</br></br></br></br>
  </div>
    </div>
  </div>
</div>

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
