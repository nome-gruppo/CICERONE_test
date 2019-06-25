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

<?php
require_once '../classi/users/Cicerone.php'; // includo la classe cicerone
session_start();
$cicerone = $_SESSION["utente"]; // prendo l'oggetto utente precedentemente messo in sessione (di tipo cicerone)
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
