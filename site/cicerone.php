<?php
namespace classi\users;
require_once '../classi/users/Cicerone.php';
require_once '../classi/utilities/Functions.php';
use classi\utilities\Functions;
$cicerone = new Cicerone();
$functions=new Functions();
session_start();
$cicerone = $_SESSION['utente'];
?>

<html lang="it">

<head>
  <meta charset="UTF-8">
  <title>Area riservata</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--ottimizza la visione su mobile dello slider-->

</head>

<body>

  <?php $functions->stampaNavbarCicerone($cicerone->getName());
    $result=$cicerone->segnalaPrenotazioni($cicerone->getId());
    $num=mysqli_num_rows($result);
    if($num>0){
  ?>
  <div class='alert alert-warning' role='alert'>
    <a href='gestioneAttivita.php' class='alert-link'>Sono presenti delle prenotazioni nelle attivita:<?php while($riga = mysqli_fetch_assoc($result)){
      $result2=$functions->recuperaTitolo($riga['id_attivita']);
      $riga2=mysqli_fetch_assoc($result2);
    echo '  '.$riga2['titolo'] ;}?>
      . Click per controllare</a>
    </div>
      <?php }  ?>

<<<<<<< HEAD
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $cicerone->getName(); ?></a>
            <ul class="dropdown-menu">
              <li><a href="ilMioProfilo.php">Il mio profilo</a></li>
              <li><a href="gestioneAttivita.php">Le mie attività</a></li>
              <li><a href="recensioniCicerone.php">Recensioni utenti</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
=======
  <?php $functions->stampaNavbarCicerone($cicerone->getName()); ?>
>>>>>>> d9f0816b664ec844abee174b4c6d89215218885d

  <?php $functions->stampaNavbarCicerone($cicerone->getName()); ?>
=======
>>>>>>> 6a306d5d9dc397cd259588a340f34795800d283e


  <h1>Benvenuto nell'area riservata!</h1><br /><br />
  <div class="text-center">
    <a href="formAttivita.php" class="btn btn-primary" .btn{font-size: 30px;}>
      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> CREA ATTIVITÀ</a>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


</body>

</html>
