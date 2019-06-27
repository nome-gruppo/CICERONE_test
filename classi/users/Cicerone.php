<?php
namespace classi\users;

require_once 'User.php';
require_once '..\classi\utilities\Database.php';
require_once '..\classi\activities\Activity.php';

use classi\utilities\Functions;
use classi\utilities\Database;
use classi\activities\Activity;

class Cicerone extends User
{

    const MAX_ACTIVITY = 3;    // numero massimo di inserzioni inseribili da cicerone non premium

    private $premiumDate = null;
    private $valutazione;
    private $myActivity = array();
    private $myReview = array();

    public function __construct()
    {}

    public function printActivity()
    {
        $database=new Database();
        $link=$database->getConnection();
        $query = "SELECT * from attivita WHERE id_cicerone={$this->getId()}";
        $result = mysqli_query($link, $query) or die("Errore connessione");
        mysqli_close($link);
        return $result;
    }

    public function setValutazione($valutazione){

        $this->valutazione = $valutazione;
    }

    public function getValutazione(){
        return $this->valutazione;
    }

    public function getPremiumDate(){
        return $this->premiumDate;
    }
    public function setPremiumDate($premiumDate){
        $this->premiumDate = $premiumDate;
    }

    public function addActivity(Activity $activity)
    {
        //se cicerone non premium
        if (premiumDate == null) {

            if(sizeof($this->myActivity) < MAX_ACTIVITY){
                $this->myActivity[] = $activity;
            }
        }else{
            echo 'Non puoi inserire altre inserzioni \r\nDiventa premium';
            //tasto diventa premium e richiama la fuzione diventa premium
        }
    }

    public function removeActivity(Activity $activity){
        $functions = new Functions();

        $functions->delete_from_array($this->myActivity, $activity);
    }
    /**
     * {@inheritDoc}
     * @see \classi\users\User::getAddress()
     */
    public function getAddress()
    {
        // TODO Auto-generated method stub
        return parent::getAddress();
    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::getBirthDate()
     */
    public function getBirthDate()
    {
        // TODO Auto-generated method stub
        return parent::getBirthDate();
    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::getContact()
     */
    public function getContact()
    {
        // TODO Auto-generated method stub
        return parent::getContact();
    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::getName()
     */
    public function getName()
    {
        // TODO Auto-generated method stub
        return parent::getName();
    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::getPassword()
     */
    public function getPassword()
    {
        // TODO Auto-generated method stub
        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::getPayment()
     */
    public function getPayment()
    {
        // TODO Auto-generated method stub
        return parent::getPayment();
    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::getSurname()
     */
    public function getSurname()
    {
        // TODO Auto-generated method stub
        return parent::getSurname();
    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::setAddress()
     */
    public function setAddress($nation, $county, $city, $street, $CAP)
    {
      parent::setAddress($nation, $county, $city, $street, $CAP);


    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::setBirthDate()
     */
    public function setBirthDate($birthDate)
    {
        parent::setBirthDate($birthDate);

    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::setContact()
     */
    public function setContact($mail, $phone_num)
    {
        parent::setContact($mail, $phone_num);

    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::setName()
     */
    public function setName($name)
    {
        parent::setName($name);

    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::setPassword()
     */
    public function setPassword($password)
    {
        parent::setPassword($password);

    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::setPayment()
     */
    public function setPayment($payment)
    {
        // TODO Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::setSurname()
     */
    public function setSurname($surname)
    {
        parent::setSurname($surname);

    }
    /**
     * {@inheritDoc}
     * @see \classi\users\User::getId()
     */
    public function getId()
    {
        // TODO Auto-generated method stub
        return parent::getId();
    }

    public function setId($id){
        parent::setId($id);
    }
}
