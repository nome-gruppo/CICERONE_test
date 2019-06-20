<?php
namespace classi\users;

require_once 'User.php';
require_once '..\classi\utilities\Database.php';

use classi\activities\Activity;
use classi\activities\Review;
use classi\utilities\Database;

class Turista extends User
{

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

    public function searchActivity($citta, $lingua, $data){
      $database=new Database();
      $link=$database->getConnetion();
      $query="SELECT attivita.id, attivita.citta, attivita.data, ciceroni.nome as nomeCicerone, ciceroni.cognome as cognomeCicerone, attivita.descrizione, attivita.lingua FROM(attivita inner join ciceroni on attivita.idCicerone=ciceroni.id)where attivita.citta='$citta'and attivita.lingua='$lingua'and attivita.data='$data'";
      $result = mysqli_query($link, $query) or die("Errore connessione");
      mysqli_close($link);
      return $result;
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
    public function setBirthDate($birthDate)
    {
       parent::setBirthDate($birthDate);
    }

    /**
     *
     * {@inheritdoc}
     * @see \classi\users\User::setContact()
     */
    public function setContact($mail, $phone_num)
    {
        parent::setContact($mail, $phone_num);
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





}
