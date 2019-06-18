<?php
namespace classi\users;

require_once 'User.php';
<<<<<<< HEAD

use classi\activities\Activity;
use classi\activities\Review;
=======
require_once '..\classi\utilities\Date.php';

use classi\activities\Activity;
use classi\activities\Review;
use classi\utilities\Date;
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff

class Turista extends User
{

<<<<<<< HEAD
    private $idTurista;

=======
>>>>>>> 0750736768bf10df9c3b7003b49ee5df14877fff
    private $activitiesDone = array();

    private $myReview = array();


    public function getIdTurista()
    {
        return $this->idTurista;
    }

    public function setIdTurista($idTurista)
    {
        $this->idTurista = $idTurista;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function addActivityDone(Activity $activity)
    {
        $this->activitiesDone($activity);
    }

    public function addReview(Review &$review)
    {
        // cerca che non l'utente non abbia già scritto una recensione per quell'attività
        $found = false;

        foreach ($this->myReview as $item) {
            if (is_object($item) && $item instanceof \classi\activities\Review) {
                if ($review->getIdActivity() == $item->getIdActivity()) {
                    $found = true;
                    break;
                }
            }
        }
        if ($found == false) {
            $review->setidTurista($this->idTurista);
        } else {
            echo 'Hai già recensito questa attività';
        }
    }

    public function removeReview($idReview)
    {
        foreach ($this->myReview as $item) {
            if (is_object($item) && $item instanceof \classi\activities\Review) {
                if ($idReview == $item->getIdActivity()) {}
            }
        }
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::getAddress()
     */
    public function getAddress()
    {
        // TODO Auto-generated method stub
        return parent::getAddress();
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::getBirthDate()
     */
    public function getBirthDate()
    {
        // TODO Auto-generated method stub
        return parent::getBirthDate();
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::getContact()
     * @return \classi\users\Contact.php
     */
    public function getContact()
    {
        // TODO Auto-generated method stub
        return parent::getContact();
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::getName()
     * @return string
     */
    public function getName()
    {
        // TODO Auto-generated method stub
        return parent::getName();
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::getPassword()
     * @return string
     */
    public function getPassword()
    {
        // TODO Auto-generated method stub
        return parent::getPassword();
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::getPayment()
     */
    public function getPayment()
    {
        // TODO Auto-generated method stub
        return parent::getPayment();
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::getSurname()
     * @return string
     */
    public function getSurname()
    {
        // TODO Auto-generated method stub
        return parent::getSurname();
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::setAddress()
     *
     */
    public function setAddress($nation, $county, $city, $street, $CAP)
    {
        parent::setAddress($nation, $county, $city, $street, $CAP);
    }

    /**
     *
     * {@inheritdoc}
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
     *
     * {@inheritdoc}
     * @see \classi\users\User::setContact()
     */
    public function setContact($email, $phone_num)
    {
        parent::setContact($email, $phone_num);
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::setName()
     */
    public function setName($name)
    {
        parent::setName($name);
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::setPassword()
     */
    public function setPassword($password)
    {
        parent::setPassword($password);
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::setPayment()
     */
    public function setPayment($payment)
    {
        // TODO Auto-generated method stub
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::setSurname()
     */
    public function setSurname($surname)
    {
        parent::setSurname($surname);
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
