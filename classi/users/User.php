<?php
namespace classi\users;
require_once 'Contact.php';
require_once '..\classi\utilities\Date.php';
require_once '..\classi\utilities\Place.php';
use classi\payments\PaymentInterface;
use classi\utilities\Date;
use classi\utilities\Place;

class User {
    
    private $id;
    private $name;
    private $surname;
    private $address;
    private $birthDate;
    private $contact;
    private $password;
    private $payment;


    /**
     * @return \classi\utilities\Place
     */
    public function getAddress()
    {
        return $this->address;
    }


    public function setPassword($password)
    {
        if(is_string($password)){
            $this->password = $password;
        } else{
            trigger_error('errore di tipo');
        }

    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    public function setName($name)
    {
        if(is_string($name)){
        $this->name = $name;
        } else{
            trigger_error('errore di tipo');
        }
    }

    public function setSurname($surname)
    {
        if(is_string($surname)){
            $this->surname = $surname;
        } else{
            trigger_error('errore di tipo');
        }
    }

    public function __construct() {

    }


    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->payment;
    }

    public function setAddress($nation, $county, $city, $street, $CAP)
    {
        $this->address = new Place($nation, $county, $city, $street, $CAP);
    }

    public function setBirthDate(Date $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function setContact( $email,  $phone_num)
    {
        $this->contact = new Contact($email, $phone_num);
    }


    public function setPayment($payment)
    {
        $this->payment = $payment;      //TODO
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}
