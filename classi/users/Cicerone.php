<?php
namespace classi\users;

require_once 'User.php';
require_once '..\classi\utilities\Database.php';

use classi\utilities\Database;

class Cicerone extends User
{

    const MAX_ACTIVITY = 5;    // numero massimo di inserzioni inseribili da cicerone non premium

    private $premiumDate = null;
    private $valutazione;


    public function segnalaPrenotazioni($idCicerone){
      $database=new Database();
      $link=$database->getConnection();
      $query="SELECT attivita.data_attivita, attivita.id_attivita from(partecipazione left join attivita on partecipazione.id_attivita=attivita.id_attivita)where id_cicerone=$idCicerone and attivita.data_attivita>CURRENT_DATE()";
      $result=mysqli_query($link, $query) or die("Errore connessione");
      mysqli_close($link);
      return $result;
    }

    public function printActivity(){
        $database=new Database();
        $link=$database->getConnection();
        $query = "SELECT * from attivita WHERE id_cicerone={$this->getId()} order by(data_attivita)";
        $result = mysqli_query($link, $query) or die("Errore connessione");
        mysqli_close($link);
        return $result;
    }
    public function contaAttivita(){
      $database=new Database();
      $link=$database->getConnection();
      $query="SELECT count(id_attivita)as numero from(attivita inner join ciceroni on attivita.id_cicerone=ciceroni.id_cicerone)group by attivita.id_cicerone";
      $result = mysqli_query($link, $query) or die("Errore connessione");
      $result2 = $result->fetch_row();
      mysqli_close($link);
      return $result2;
    }
    public function visualizzaPartecipanti($id_attivita){
      $database=new Database();
      $link=$database->getConnection();
      $query="SELECT *from(turista inner join partecipazione on turista.id_turista=partecipazione.id_turista)where partecipazione.id_attivita=$id_attivita and accettazione=true";
      $result = mysqli_query($link, $query) or die("Errore connessione");
      mysqli_close($link);
      return $result;
    }
    public function rifiutaPrenotazione($id_turista, $id_attivita){
      $database=new Database();
      $link=$database->getConnection();
      $query="UPDATE partecipazione SET accettazione=false WHERE id_turista=$id_turista and id_attivita=$id_attivita";
      $result = mysqli_query($link, $query) or die("Errore connessione");
      mysqli_close($link);
      return $result;
    }

    public function setValutazione($valutazione){

        $this->valutazione = $valutazione;
    }

    public function getValutazione(){
        return $this->valutazione;
    }

    public function getPremiumDate(){
        return $this->premiumDate;
    }
    public function setPremiumDate($premiumDate){
        $this->premiumDate = $premiumDate;
    }

}
