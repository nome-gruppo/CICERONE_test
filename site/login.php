<?php
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
