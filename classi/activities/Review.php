<?php
namespace classi\activities;

class Review
{

    private $id_turista;

    private $id_cicerone;

    private $title;

    private $valutation;

    private $text;

    public function getId_cicerone()
    {
        return $this->id_cicerone;
    }

    public function __construct($id_cicerone,$id_turista, $title, $valutation, $text){
        if (is_string($title) && is_string($text)) {
            $this->id_cicerone = $id_cicerone;
            $this->id_turista = $id_turista;
            $this->title = ucfirst(strtolower(trim($title)));
            $this->valutation = intval($valutation);
            $this->text = trim($text);
        }else {
            trigger_error('errore di tipo');
        }
    }


    public function getValutation()
    {
        return $this->valutation;
    }

    public function getId_turista()
    {
        return $this->id_turista;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getText()
    {
        return $this->text;
    }
}

