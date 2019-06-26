<?php 
namespace classi\payments;
?>
<link rel="stylesheet" href="css/bootstrap.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<?php

abstract class AbPayment{
    
    private $import;     

    public function sendPayment($import)
    {
        if(is_float($import)){
            $this->import = $import;
            echo "<div class='alert alert-success' role='alert'>
            <a href='site\cicerone.php' class='alert-link'>Pagamento effettuato con successo! Click per tornare all'area riservata</a>
          </div>";
        } else{
            trigger_error('errore di tipo');
        }
    }
}
