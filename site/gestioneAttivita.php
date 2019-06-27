<?php
namespace classi\users;
<<<<<<< HEAD
require_once '../classi/users/Cicerone.php';
require_once '../classi/utilities/Functions.php';
use classi\utilities\Functions;
$cicerone = new Cicerone();
$functions=new Functions();
session_start();
$cicerone = $_SESSION['utente'];
=======
require_once '../classi/users/Cicerone.php'; // includo la classe cicerone
session_start();
>>>>>>> e98371685b21ae9059d877d813769a25532bb2a6
?>

<html lang="it">
<head>
<meta charset="UTF-8">
<title>Gestione Attività</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!--ottimizza la visione su mobile dello slider-->
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a class="navbar-brand" href="cicerone.php" button type="button" class="btn btn-default btn-lg"> Area riservata</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $cicerone->getName(); ?></a>
            <ul class="dropdown-menu">
              <li><a href="ilMioProfilo.php">Il mio profilo</a></li>
              <li><a href="gestioneAttivita.php">Le mie attività</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  
<?php
<<<<<<< HEAD
$functions->stampaNavbarCicerone($cicerone->getName());
=======
$cicerone = $_SESSION["utente"]; // prendo l'oggetto utente precedentemente messo in sessione (di tipo cicerone)
>>>>>>> e98371685b21ae9059d877d813769a25532bb2a6
$result = $cicerone->printActivity();
$num = mysqli_num_rows($result);
if ($num > 0) {
    ?>
      <table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Citta</th>
				<th scope="col">Data</th>
				<th scope="col">Costo €</th>
				<th scope="col">Lingua</th>
				<th scope="col">Descrizione</th>
				<th scope="col">Partecipanti</th>
			</tr>
		</thead>
		<tbody>
        <?php
    $i = 0;
    while ($riga = mysqli_fetch_assoc($result)) { // assoccio il risultato della funzione(record per record)a un array riga fin quando il record non sarà zero e quindi $riga diventerà false
        $i ++;
        ?>
                  <tr>
				<th scope="row"><?php echo $riga['id_attivita'];//stampo il campo citta dell'array $riga ?></th>
				<td><?php echo $riga['citta'];?></td>
				<td><?php echo $riga['data_attivita'];?></td>
				<td><?php echo $riga['costo'];?></td>
				<td><?php echo $riga['lingua'];?></td>
				<td><?php echo $riga['descrizione'];?></td>
        <td><a href="visualizzaPrenotazioni.php?<?php echo $riga['id_attivita'];?>">VISUALIZZA</a></td>
			</tr>
            <?php
    }
    ?>

      </tbody>
	</table>


    <?php
} else {
    echo "<div class='alert alert-danger' role='alert'>
      <a href='cicerone.php' class='alert-link'>Nessuna attività presente al momento. Click per tornare indietro!</a>
    </div>";
}
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
