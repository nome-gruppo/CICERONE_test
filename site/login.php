<?php
<<<<<<< HEAD
session_start();
$link=mysqli_connect("localhost", "root", "root","cicerone")or die("Errore di connessione!");
  if(isset($_POST["login"])) {
  $mail=$_POST['mail'];
  $passwordget=$_POST['password'];
  $password = sha1(md5(sha1($passwordget)));
  if($mail==""||$password==""){
    echo "Non tutti i campi sono stati compilati";
  }
    else {
      $query="SELECT *from cicero WHERE mail='$mail' and password='$password'";
      $result=mysqli_query($link, $query) or die("Errore connessione");
      $num=mysqli_num_rows($result);
      if($num==1){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	         $_SESSION["id"]=$row["id"];
           $_SESSION["nome"]= $row["nome"];
           $_SESSION["cognome"]=$row["cognome"];
           $_SESSION["mail"]= $row["mail"];
           $_SESSION['password']=$row['password'];
           $_SESSION['citta']= $row['citta'];
           $_SESSION['lingua']=$row['lingua'];
           $_SESSION['telefono']=$row['telefono'];
           $_SESSION['lingua2']= $row['lingua2'];
           $_SESSION['lingua3']=$row['lingua3'];
           $_SESSION['logged'] =true;  // Nella variabile SESSION associo TRUE al valore logge
           mysqli_free_result($result);
           header("location:cicerone.php");
      }elseif($num==0){
          $query="SELECT *from turista WHERE mail='$mail' and password='$password'";
          $result=mysqli_query($link, $query) or die("Errore connessione");
          $num=mysqli_num_rows($result);
          if($num==1){
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    	         $_SESSION["id"]=$row["id"];
               $_SESSION["nome"]= $row["nome"];
               $_SESSION["cognome"]=$row["cognome"];
               $_SESSION["telefono"]=$row["telefono"];
               $_SESSION["mail"]= $row["mail"];
               $_SESSION["password"]=$row["password"];
               $_SESSION["lingua"]=$row["lingua"];
               $_SESSION['logged'] =true;  // Nella variabile SESSION associo TRUE al valore logged
               mysqli_free_result($result);
            header("location:turista.php");
        }
        else{
          echo "Errore di accesso! Controlla di aver inserito correttamente mail e password";
        }
      }
    mysqli_close($link);
  }
}
 ?>
=======
namespace classi\users;
use classi\utilities\Database;
require_once '../classi/users/Turista.php';
require_once '../classi/users/Cicerone.php';
require_once '../classi/utilities/Database.php';


// connessione database
session_start();
$database = new Database();
$link = $database->getConnetion();

if (isset($_POST["login"])) {
    

    
    $mail = trim($_POST['mail']);
    $password = $_POST['password'];
    
    if ($mail == "" || $password == "") {
        echo "Non tutti i campi sono stati compilati";
    } else {

        $password = sha1(md5(sha1($password)));
        
        // ricerca nela tabella ciceroni
        $query = "SELECT * from ciceroni WHERE mail='$mail' and password='$password'";
        $result = mysqli_query($link, $query) or die("Errore connessione");
        $num = mysqli_num_rows($result);
        
        if ($num == 1) {

            $cicerone = new Cicerone();
            
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            $cicerone->setId($row['id_cicerone']);
            $cicerone->setName($row['nome']);
            $cicerone->setSurname($row['cognome']);
            $cicerone->setContact($row['mail'], $row['telefono']);
            $cicerone->setAddress($row['nazione'], $row['provincia'], $row['citta'],$row['indirizzo'], $row['cap']);
            $cicerone->setPassword($row['password']);
            


            
            $_SESSION['cicerone'] = serialize($cicerone);
            
            $_SESSION['logged'] = true; // Nella variabile SESSION associo TRUE al valore logged
            mysqli_free_result($result);
            header("location:cicerone.php");
            
        } elseif ($num == 0) {
       
            $query = "SELECT * from turista WHERE mail='$mail' and password='$password'";
            $result = mysqli_query($link, $query) or die("Errore connessione");
            $num = mysqli_num_rows($result);
            
            if ($num == 1) {
                
                $turista = new Turista();
                
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $turista->setId($row['id_turista']);
                $turista->setName($row['nome']);
                $turista->setSurname($row['cognome']);
                $turista->setContact($row['mail'], $row['telefono']);
                $turista->setAddress($row['nazione'], $row['provincia'], $row['citta'],$row['indirizzo'], $row['cap']);
                $turista->setPassword($row['password']);
                
                var_dump($row['data_nascita']);
                
                $_SESSION['turista'] = serialize($turista);
                
                $_SESSION['logged'] = true; // Nella variabile SESSION associo TRUE al valore logged
                mysqli_free_result($result);
                header("location:turista.php");
                
            } else {
                echo "Errore di accesso! Controlla di aver inserito correttamente mail e password";
            }
        }
        mysqli_close($link);
    }
}
?>
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
