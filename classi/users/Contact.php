<?php
namespace classi\users;

//dichiarazione classe "contatto" contenente info utente
class Contact{
    private $mail;
    private $phone_num;
    
 
    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @return string
     */
    public function getPhone_num()
    {
        return $this->phone_num;
    }

    public function __construct($mail, $phone_num) {
        
        if(is_string($mail) && is_string($phone_num)){
        $this->mail = trim($mail);        //TODO controllo sulla mail
        
        //controllo sulla stringa contenente numero di telefono
        if(is_numeric(trim($phone_num))){
            $this->phone_num = trim($phone_num);
        }else{
            echo 'Numero di telefono non accettato';
        }   
        }else{
            trigger_error('errore di tipo');
        }
    }
    
    
    
}

