<?php
namespace classi\activities;

class Review
{

    private $idTurista;

    private $idActivity;

    private $idCicerone;

    private $title;

    private $valutation;

    private $text;

    public function getIdActivity()
    {
        return (int) $this->idActivity;
    }

    public function __construct($idActivity)
    {
        $this->idActivity = $idActivity;
    }

    public function setidTurista($idTurista)
    {
        $this->idTurista = $idTurista;
    }

    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->title = $title;
        } else {
            trigger_error('errore di tipo');
        }
    }

    public function getValutation()
    {
        return $this->valutation;
    }

    public function setValutation($valutation)
    {
        if (is_int($valutation)) {
            $this->valutation = $valutation;
        } else {
            trigger_error('errore di tipo');
        }
    }

    public function set_text()
    {
        $this->text = trim($_POST['text']); // TODO controlla
    }
}

