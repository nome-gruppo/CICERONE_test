<?php
namespace classi\activities;

use classi\utilities\Database;

require_once '../classi/utilities/Database.php';

class Activity
{
  private  $idAttivita;
  private  $idCicerone;
  private  $citta;
  private  $costo;
  private  $descrizione;
  private  $lingua;
  private  $data;

  public function __construct($idCicerone, $citta, $costo, $descrizione, $lingua, $data)
  { //costruttore della classe attivita
    $this->idCicerone = $idCicerone;
    $this->citta = $citta;
    $this->costo = $costo;
    $this->lingua = $lingua;
    $this->descrizione = $descrizione;
    $this->data = $data;
  }
  public function setIdAttivita($idAttivita)
  {
    $this->idAttivita = $idAttivita;
  }
  public function insertDatabase()
  { //funzione di inserimento dati attivita nel database
    $database = new Database();
    $link = $database->getConnection();
    $query = "INSERT INTO {$database->getActivity_table()} VALUES('$this->idCicerone','$this->citta','$this->data', '$this->costo','$this->descrizione','$this->lingua')";
    $result = mysqli_query($link, $query) or die("Errore di registrazione! Controlla di aver compilato tutti i campi.");

    mysqli_close($link);
    return $result;
  }
}
