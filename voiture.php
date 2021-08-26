<?php
require_once 'voitureDAO.php';

class Voiture extends VoitureDAO
{
    public function findALL()
    {
        $request = "SELECT * FROM cartable";
        $sth = $this->db->prepare($request);
        // return $sth->execute();
        return $this->getSelfObjectsPreparedStatement($sth);
    }
    public function addNew()
    {
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
        $request = "DELETE FROM cartable WHERE registration= :id";
        $sth = $this->db->prepare($request);
        $sth->bindParam(':id', $id);
        return $sth->execute();
    }
    // public function modifyRow($registration ,$colour,$make,$model){

    // }
}
