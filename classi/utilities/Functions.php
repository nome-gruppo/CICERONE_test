<?php
namespace classi\utilities;

require_once 'Date.php';

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

    /**La funzione StringToDate converte una stringa nel formato dd/mm/yyyy in
     * una variabile di tipo \classi\utilities\Date assegnando gli attributi come segue:
     *
     * day = dd
     * month = mm
     * year = yyyy
     *
     * @param string $stringDate    stringa in formato dd/mm/yyyy da convertire
     * @return \classi\utilities\Date   variabile di tipo Date restituita
     */
    public function StringToDate($stringDate)
    {
        if (is_string($stringDate)) {

            $pieces = explode('/', $stringDate);

            $date = new Date(intval($pieces[0]), intval($pieces[1]), intval($pieces[2]));

            return $date;
        } else {
            trigger_error('errore di tipo');
        }
    }
    /**
     *
     * @param Date $date
     * @return string
     */
    public function writeDateDb(Date $date){
        $pieces = array();
        array_push($pieces,$date->getYear());
        array_push($pieces,$date->getMonth());
        array_push($pieces,$date->getDay());

        return implode('-', $pieces);

    }
}
?>
 
