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
    if (is_string($citta) && is_int($costo) && is_string($descrizione) &&is_numeric($costo) && is_string($lingua) && is_string($data)) {
      $this->idCicerone = $idCicerone;
      $this->citta = ucfirst(trim($citta));
      $this->costo = intVal($costo);
      $this->lingua = trim($lingua);
      $this->descrizione = trim($descrizione);
      $this->data = $data;
    } else {
      trigger_error('Errore di tipo');
    }
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
    $result = mysqli_query($link, $query) or die("Errore di connessione!");
    mysqli_close($link);
    return $result;
  }

  public function getIdAttivita()
  {
    return $this->idAttivita;
  }


  public function getIdCicerone()
  {
    return $this->idCicerone;
  }


  public function getCitta()
  {
    return $this->citta;
  }


  public function getCosto()
  {
    return $this->costo;
  }


  public function getDescrizione()
  {
    return $this->descrizione;
  }


  public function getLingua()
  {
    return $this->lingua;
  }


  public function getData()
  {
    return $this->data;
  }
}
