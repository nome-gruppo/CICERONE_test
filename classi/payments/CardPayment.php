<?php
namespace classi\payments;

use classi\utilities\Functions;
include ("Functions.php");

class CardPayment extends AbPayment
{

    private $code;

    // codice numerico di 16 cifre
    private $cvv;

    // codice di 3 cifre posto sul retro della carta
    const CODE_SIZE = 16;

    // lunghezza codice identificativo carta di credito
    const CVV_SIZE = 3;

    // lunghezza codice cvv
    public function sendPayment($import)
    {
        if (is_float($import)) {
            $functions = new Functions();

            echo 'Inserisci codice cvv presente sul retro della carta';

            // controllo stringa numerica e lunghezza stringa
            while ($functions->code_control($_POST[$this->cvv], CODE_SIZE) == false) {

                echo 'Codice cvv non valido';
            }

            echo 'Pagamento di € ' . number_format($import, 2) . ' effettuato con successo'; // stampa solo 2 cifre decimali
        } else {
            trigger_error('errore di tipo');
        }
    }

    // costruttore che crea l'oggetto e controlla che la lungezza del numero della carta sia giusto
    public function __construct($code)
    {
        if (is_string($code)) {
            $functions = new Functions();

            if ($functions->code_control($code, CODE_SIZE) == true) {
                $this->code = $code;
            } else {
                echo "codice carta non valido";
            }
        } else {
            trigger_error('errore di tipo');
        }
    }
}
