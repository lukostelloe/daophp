<?php
require_once 'voitureDAO.php';

class Voiture extends VoitureDAO
{
    public function findALL()
    {
        $request = "SELECT * FROM cartable";
        $sth = $this->db->prepare($request);
        return $this->getSelfObjectsPreparedStatement($sth);
    }
    public function addNew()
    {
        // j'ai pas de formulaire pour testé:::: mais la c'est correct ! 
        $registration = $_POST["registration"];
        $colour = $_POST["colour"];
        $make = $_POST["make"];
        $model = $_POST["model"];
        $request = "INSERT INTO cartable (registration, colour, make, model) VALUES ('$registration', '$colour', '$make', '$model')";
        $sth = $this->db->prepare($request);
        return $this->getSelfObjectsPreparedStatement($sth);
    }
    public function deleteRow($id)
    {
        $request = "DELETE FROM cartable WHERE id = $id";
        $sth = $this->db->prepare($request);
        return $this->getSelfObjectsPreparedStatement($sth);
    }
    public function decodeJson()
    {
        $jsonString = $this->findALL();
        $data = json_encode($jsonString);
        $bytes = file_put_contents("cars.json", $data);
        return $bytes;
    }
    // public function updateRow($id){
    //     $request = "UPDATE cartable SET registration = $_POST[], colour, make, model WHERE id = $id";
    //     $sth = $this->db->prepare($request);
    //     return $this->getSelfObjectsPreparedStatement($sth);
    // }
}
