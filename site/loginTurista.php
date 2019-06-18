<?php
$link=mysqli_connect("localhost", "root", "root","cicerone")or die("Errore di connessione!");
  if(isset($_POST["login"])) {
  $mail=$_POST['mail'];
  $password=$_POST['password'];
  if($mail=""||$password=""){
    echo "Non tutti i campi sono stati compilati";
  }
    else {
      $query="SELECT *from turista WHERE mail='$mail' and password='$password'";
      $result=mysqli_query($link, $query) or die("Errore connessione");
      if(mysqli_num_rows($query)!=0){
        $array=mysqli_fetch_assoc($query);
        $_SESSION["logged"] =true;  // Nella variabile SESSION associo TRUE al valore logge
        header("location:cicerone.html"); // e mando per esempio ad una pagina esempio.php// in questo caso rimanderò ad una pagina prova.php
        }else{
        echo "non ti sei registrato con successo"; // altrimenti esce scritta a video questa stringa di errore
        }
      }
    mysqli_close($link);
  }
 ?>
