<?php
namespace classi\utilities;


<<<<<<< HEAD
=======
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', 'root');
define('DATABASE', 'cicerone');
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff

class Database
{
    private $turista_table = "turista(nome, cognome, data_nascita, telefono, mail, password, nazione, provincia, citta, indirizzo, cap)";
    private $cicerone_table = "ciceroni(nome, cognome, data_nascita, telefono, mail, password, nazione, provincia, citta, indirizzo,cap, data_premium)";
    private $connection;
    
    
    
    public function __construct()
    {
<<<<<<< HEAD
        $this->connection = mysqli_connect("localhost", "root", "root", "cicerone") or die("Errore di connessione!");
=======
        $this->connection = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE) or die("Errore di connessione!");
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
    }
    
    public function getConnetion(){
        return $this->connection;
    }
<<<<<<< HEAD
=======
    /**
     * @return string
     */
    public function getTurista_table()
    {
        return $this->turista_table;
    }

    /**
     * @return string
     */
    public function getCicerone_table()
    {
        return $this->cicerone_table;
    }


    
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
}

