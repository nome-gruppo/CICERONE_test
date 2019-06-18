<?php
namespace classi\utilities;



class Database
{
    private $turista_table = "turista(nome, cognome, data_nascita, telefono, mail, password, nazione, provincia, citta, indirizzo, cap)";
    private $cicerone_table = "ciceroni(nome, cognome, data_nascita, telefono, mail, password, nazione, provincia, citta, indirizzo,cap, data_premium)";
    private $connection;
    
    
    
    public function __construct()
    {
        $this->connection = mysqli_connect("localhost", "root", "root", "cicerone") or die("Errore di connessione!");
    }
    
    public function getConnetion(){
        return $this->connection;
    }
}

