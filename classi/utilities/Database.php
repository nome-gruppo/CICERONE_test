<?php
namespace classi\utilities;

define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', 'root');
define('DATABASE', 'cicerone');

class Database
{
    private $turista_table = "turista(nome, cognome, data_nascita, telefono, mail, password, nazione, provincia, citta, indirizzo, cap)";
    private $cicerone_table = "ciceroni(nome, cognome, data_nascita, telefono, mail, password, nazione, provincia, citta, indirizzo, cap, data_premium, valutazione)";
    private $activity_table = "attivita(id_cicerone,titolo,citta,data_attivita,costo,descrizione,lingua)";
    private $review_table = "recensioni(titolo,valutazione,testo,id_cicerone,id_turista)";
    private $partecipazione_table="partecipazione(id_attivita, id_turista)";
    private $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE) or die("Errore di connessione!");
    }

    public function getConnection(){
        return $this->connection;
    }

    public function getTurista_table()
    {
        return $this->turista_table;
    }

    public function getCicerone_table()
    {
        return $this->cicerone_table;
    }

    public function getActivity_table()
    {
        return $this->activity_table;
    }

    public function getReview_table()
    {
        return $this->review_table;
    }
    public function getPartecipazione_table(){
        return $this->partecipazione_table;
    }
}
