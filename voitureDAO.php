<?php
require_once 'DAO.php';
abstract class VoitureDAO extends EntityBase
{
    public function getRegistration()
    {
        return $this->registration;
    }

    public function setRegistration($registration)
    {
        $this->id = $registration;
    }
    ////
    public function getColour()
    {
        return $this->colour;
    }

    public function setCouleur($colour)
    {
        $this->couleur = $colour;
    }
    ////
    public function getMake()
    {
        return $this->make;
    }

    public function setMarque($make)
    {
        $this->make = $make;
    }
    ////
    public function getModel()
    {
        return $this->model;
    }

    public function setModele($model)
    {
        $this->model = $model;
    }

    public function __construct()
    {
        parent::__construct();
        $this->table = 'cartable';
        $this->primkeys = ['id'];
        $this->fields = ['registration', 'colour', 'make', 'model'];
        $this->sql = "SELECT * FROM {$this->table}";
        // if ($immatriculation) $this->read($immatriculation);
    }
}
