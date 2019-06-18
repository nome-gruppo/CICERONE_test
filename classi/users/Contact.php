<?php
namespace classi\users;

//dichiarazione classe "contatto" contenente info utente
class Contact{
    private $email;
    private $phone_num;
    
 
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone_num()
    {
        return $this->phone_num;
    }

    public function __construct(string $email, string $phone_num) {
        
        if(is_string($email) && is_string($phone_num)){
        $this->email = trim($email);        //TODO controllo sulla mail
        
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

