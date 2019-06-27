<?php
namespace classi\utilities;
require_once '..\classi\utilities\Database.php';
use classi\utilities\Database;

class Functions
{

    public function __construct()
    {}

    /**
     * La funzione code_control controlla che la variabile $code sia una
     * stringa numerica e che la sua lunghezza sia pari a $size
     * La funzione restituisce una variabile booleana vera se la stringa è composta da soli numeri
     * e la sua lunghezza è corretta, falso altrimenti
     *
     * @param mixed $code
     *            stringa numerica da controllare
     * @param int $size
     *            variabile che indica la lunghezza di $code
     * @return boolean vero se i controlli hanno esito positivo, falso altrimenti
     */

    public function recuperoMailCicerone($id_attivita){
      $database=new Database();
      $link=$database->getConnection();
      $query="SELECT mail from(ciceroni inner join attivita on ciceroni.id_cicerone=attivita.id_cicerone)where attivita.id_attivita=$id_attivita";
      $result = mysqli_query($link, $query) or die("Errore di connessione");
      $result2 = $result->fetch_row();
      mysqli_close($link);
      return $result2;
    }
    public function stampaNavbarTurista($nameTurista){
      echo '<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="turista.php" button type="button" class="btn btn-default btn-lg">
          Benvenuto </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>  '  .$nameTurista.'</a>
            <ul class="dropdown-menu">
              <li><a href="ilMioProfilo.php">Il mio profilo</a></li>
              <li><a href="attivitaTurista.php?inProgramma">Attività in programma</a></li>
              <li><a href="attivitaTurista.php?attivitaSvolte">Attività svolte</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>   Logout</a></li>
            </ul>
          </li>
        </ul>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>';
    }
    public function stampaNavbarCicerone($nameCicerone){
      echo '<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a class="navbar-brand" href="cicerone.php" button type="button" class="btn btn-default btn-lg"> Area riservata</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>  '  .$nameCicerone.'</a>
                <ul class="dropdown-menu">
                  <li><a href="ilMioProfilo.php">Il mio profilo</a></li>
                  <li><a href="gestioneAttivita.php">Le mie attività</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>';
    }
    public function code_control($code, $size)
    {
        if (is_int($size)) {
            $correct = true;

            if (! is_numeric($code) || sizeof($code) != $size) {
                $correct = false;
            }

            return $correct;
        } else {
            trigger_error('errore di tipo');
        }
    }

    /**
     * La funzione delete_from_array controlla che un elemento sia contenuto nell'array
     * e, se la ricerca dovesse risultare positiva, l'elemeto verrà eliminato
     *
     * @param mixed $array
     *            array in cui effettuare la ricerca
     * @param mixed $element
     *            elemento da eliminare dall'array
     * @return array|mixed array restituito dalla funzione. Questo sarà privo di $element in caso di ricerca positiva,
     *         altrimenti sarà uguale all'array passato come paramentro
     */
    public function delete_from_array($array, $element)
    {

        // controllo prensenza nell'array
        if (in_array($element, $array)) {
            unset($array[array_search($element, $array)]); // se presente elimina

            return array_values($array);
        } else {
            return $array;
        }
    }

    /**
     *
     * @param string $date
     * @return string
     */
    public function writeDateDb($date){

        if(is_string($date)){
        $pieces = array();
        $pieces = explode('/', $date);

        return implode('-', array_reverse($pieces));
        }else{
            trigger_error('errore di tipo');
        }
    }

    public function DateDb_to_Date($date){
        if(is_string($date)){
            $pieces = array();
            $pieces = explode('-', $date);

            return implode('/', array_reverse($pieces));
            }else{
                trigger_error('errore di tipo');
            }
    }

    public function dateDiff($date1, $date2, $format){
        $datetime1 = new \DateTime($date1);
        $datetime2 = new \DateTime($date2);
        $interval = $datetime1->diff($datetime2);
        return $interval->format($format);
    }

}


?>
