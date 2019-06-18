<?php
namespace classi\users;

<<<<<<< HEAD
use classi\activities\Activity;
use classi\utilities\Functions;

class Cicerone extends User
{

    const MAX_ACTIVITY = 3;

    // numero massimo di inserzioni inseribili da cicerone non premium
    private $idCicerone;
=======
require_once 'User.php';
require_once '..\classi\utilities\Date.php';

use classi\activities\Activity;
use classi\utilities\Functions;
use classi\utilities\Date;
class Cicerone extends User
{

    const MAX_ACTIVITY = 3;    // numero massimo di inserzioni inseribili da cicerone non premium
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff

    private $premiumDate = null;

    private $myActivity = array();

    private $myReview = array();

    public function __construct()
    {}
<<<<<<< HEAD
=======
    
    
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff

    public function addActivity(\classi\activities\Activity $activity)
    {
        //se cicerone non premium
        if (premiumDate == null) {
            
            if(sizeof($myActivity) < MAX_ACTIVITY){
                $this->myActivity[] = $activity;
            }
        }else{
            echo 'Non puoi inserire altre inserzioni \r\nDiventa premium';
            //tasto diventa premium e richiama la fuzione diventa premium
        }
    }
    
    public function removeActivity(\classi\activities\Activity $activity){
        $functions = new Functions();
        
        $functions->delete_from_array($yhis->myActivity, $activity);
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
        // TODO Auto-generated method stub
        
    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::setBirthDate()
     */
<<<<<<< HEAD
    public function setBirthDate($day, $month, $year)
    {
        // TODO Auto-generated method stub
=======
    public function setBirthDate(Date $birthDate)
    {
        parent::setBirthDate($birthDate);
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
        
    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::setContact()
     */
    public function setContact($email, $phone_num)
    {
        // TODO Auto-generated method stub
        
    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::setName()
     */
    public function setName($name)
    {
        // TODO Auto-generated method stub
        
    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::setPassword()
     */
    public function setPassword($password)
    {
        // TODO Auto-generated method stub
        
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
        // TODO Auto-generated method stub
        
    }
<<<<<<< HEAD
=======
    /**
     * {@inheritDoc}
     * @see \classi\users\User::getId()
     */
    public function getId()
    {
        // TODO Auto-generated method stub
        return parent::getId();
    }

    /**
     * {@inheritDoc}
     * @see \classi\users\User::setId()
     */
    public function setId($id)
    {
        parent::setId($id);
    }


>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff

    
    
}

