<?php
namespace classi\utilities;

// dichiarazione classe "place"
class Place
{

    private $nation;

    private $county;    // campo provincia
    private $city;

    private $street;

    private $CAP;

    /**
     *
     * @return string
     */
    public function getNation()
    {
        return $this->nation;
    }

    /**
     *
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     *
     * @return string
     */
    public function getCAP()
    {
        return $this->CAP;
    }

    /**
     *
     * @param string $nation
     * @param string $county
     * @param string $city
     * @param string $street
     * @param string $CAP
     */
    public function __construct($nation, $county, $city, $street, $CAP)
    {
        if(is_string($nation) && is_string($county) && is_string($city) && is_string($street) && is_string($CAP)){
            $this->nation =  ucfirst(strtolower(trim($nation)));
            $this->county =  ucfirst(strtolower(trim($county)));
            $this->city =  ucfirst(strtolower(trim($city)));
            $this->street =  ucfirst(strtolower(trim($street)));
            $this->CAP = trim($CAP);
        }
        else{
            trigger_error('Errore di tipo');
        }
    }
}

