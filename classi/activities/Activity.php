<?php
namespace classi\activities;

class Activity{
  private  $idAttivita;
  private  $idCicerone;
  private  $citta;
  private  $costo;
  private  $descrizione;
  private  $lingua;
  private  $data;

  public function __construct($idCicerone, $citta, $costo, $descrizione, $lingua, $data){ //costruttore della classe attivita
    $this->idCicerone = $idCicerone;
    $this->citta = $citta;
    $this->costo = $costo;
    $this->lingua = $lingua;
    $this->descrizone = $descrizione;
    $this->data = $data;
  }
  public function setIdAttivita($idAttivita){
    $this->idAttivita = $idAttivita;
  }
  public function insertDatabase(){//funzione di inserimento dati attivita nel database
      $link=mysqli_connect("localhost", "root", "root","cicerone")or die("Errore connessione!");
      $query="INSERT INTO attivita(id_cicerone, citta, costo, descrizione, lingua, data)VALUES('$this->idCicerone','$this->citta', '$this->costo','$this->descrizione','$this->lingua','$this->data')";
      $result=mysqli_query($link, $query)or die("Errore di registrazione! Controlla di aver compilato tutti i campi.");
      $this->idAttivita=mysql_insert_id(attivita);//assegna l'ultimo valore Id all'interno della tabella attivita
      //$query2="SELECT id from attivita ORDER BY id DESC LIMIT 1";//per prelevare dal databse l'id dell'ultima attività immessa ovvero quella appena inserita
    //  $result=mysqli_query($link, $query2)or die("Errore di registrazione! Controlla di aver compilato tutti i campi.");
    //  $this->idAttivita=$result;//assegno a idAttivita il numero dell'ultima attività immessa nel database
      mysqli_close($link);
      return $result;
    }
}
 ?>
