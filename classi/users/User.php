<?php 
namespace classi\users;
require_once 'Contact.php';
<<<<<<< HEAD
=======
require_once '..\classi\utilities\Date.php';
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
require_once '..\classi\utilities\Place.php';
use classi\payments\PaymentInterface;
use classi\utilities\Date;
use classi\utilities\Place;

class User {
<<<<<<< HEAD
=======
    private $id;
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
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

<<<<<<< HEAD
    public function setAddress($nation, $county,$city, $street, $CAP)
=======
    public function setAddress($nation, $county, $city, $street, $CAP)
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
    {
        $this->address = new Place($nation, $county, $city, $street, $CAP);
    }

<<<<<<< HEAD
    public function setBirthDate( $day,  $month,  $year)
    {
        $this->birthDate = new Date($day, $month, $year);
=======
    public function setBirthDate(Date $birthDate)
    {
        $this->birthDate = $birthDate;
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
    }

    public function setContact( $email,  $phone_num)
    {
        $this->contact = new Contact($email, $phone_num);
    }


    public function setPayment($payment)
    {
        $this->payment = $payment;      //TODO
    }
<<<<<<< HEAD
=======
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

>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff

}

