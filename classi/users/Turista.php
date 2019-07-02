<?php
namespace classi\users;

require_once 'User.php';
require_once '..\classi\utilities\Database.php';

use classi\utilities\Database;

class Turista extends User
{


    public function searchActivity($citta, $lingua, $data_inizio, $data_fine){
      $database=new Database();
      $link=$database->getConnection();
      $query="SELECT attivita.id_attivita,attivita.titolo, ciceroni.valutazione, attivita.citta, attivita.data_attivita, ciceroni.nome as nomeCicerone, ciceroni.cognome as cognomeCicerone, attivita.descrizione, attivita.lingua, attivita.costo FROM(attivita inner join ciceroni on attivita.id_cicerone=ciceroni.id_cicerone)where attivita.citta='$citta'and attivita.lingua='$lingua' and (attivita.data_attivita BETWEEN '$data_inizio'and '$data_fine') and ({$this->getId()},attivita.id_attivita) not in(select id_turista, id_attivita from partecipazione)ORDER BY(costo)";
      $result = mysqli_query($link, $query)or die("Errore connessione");
      mysqli_close($link);
      return $result;
    }
    public function confermaAttivita($id_attivita){
      $database=new Database();
      $link=$database->getConnection();
      $query="INSERT INTO partecipazione(id_attivita, id_turista) VALUES('$id_attivita','{$this->getId()}')";
      $result = mysqli_query($link, $query) or die("Errore connessione!");
      mysqli_close($link);
      return $result;
    }
    public function inProgramma(){
      $database=new Database();
      $link=$database->getConnection();
      $query="SELECT attivita.id_attivita, ciceroni.valutazione, attivita.titolo, attivita.citta, attivita.data_attivita, ciceroni.nome as nomeCicerone, ciceroni.cognome as cognomeCicerone, attivita.descrizione, attivita.lingua, attivita.costo FROM(((attivita inner join ciceroni on attivita.id_cicerone=ciceroni.id_cicerone)inner join partecipazione on attivita.id_attivita=partecipazione.id_attivita)inner join turista on partecipazione.id_turista=turista.id_turista)WHERE data_attivita>=CURRENT_DATE() AND partecipazione.id_turista={$this->getId()} AND accettazione=true ORDER BY(data_attivita)";
      $result = mysqli_query($link, $query) or die("Errore connessione");
      mysqli_close($link);
      return $result;
    }
    public function attivitaSvolte(){
      $database=new Database();
      $link=$database->getConnection();
      $query="SELECT attivita.id_attivita, ciceroni.id_cicerone, attivita.titolo, attivita.citta, attivita.data_attivita, ciceroni.nome as nomeCicerone, ciceroni.cognome as cognomeCicerone, attivita.descrizione, attivita.lingua, attivita.costo FROM(((attivita inner join ciceroni on attivita.id_cicerone=ciceroni.id_cicerone)inner join partecipazione on attivita.id_attivita=partecipazione.id_attivita)inner join turista on partecipazione.id_turista=turista.id_turista)WHERE((data_attivita<CURRENT_DATE()) AND (partecipazione.id_turista={$this->getId()}))ORDER BY(data_attivita)";
      $result = mysqli_query($link, $query) or die("Errore connessione");
      mysqli_close($link);
      return $result;
    }
    public function deletePrenotazione($id_attivita){
      $database=new Database();
      $link=$database->getConnection();
      $query="DELETE from partecipazione WHERE id_attivita=$id_attivita and id_turista={$this->getId()}";
      $result = mysqli_query($link, $query) or die("Errore connessione");
      mysqli_close($link);
      return $result;
    }
    public function controllaRifiuto(){
      $database=new Database();
      $link=$database->getConnection();
      $query="SELECT accettazione, partecipazione.id_attivita from(partecipazione INNER JOIN attivita ON partecipazione.id_attivita=attivita.id_attivita)WHERE partecipazione.id_turista={$this->getId()} and accettazione=false and attivita.data_attivita>CURRENT_DATE()";
      $result = mysqli_query($link, $query) or die("Errore connessione");
      mysqli_close($link);
      return $result;
    }

}
