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
    public function modifyRow($dico)
    {
        $dico = json_decode($dico);
        $request = "UPDATE cartable SET registration = :registration, colour = :colour, make = :make, model = :model WHERE id = :id";
        $sth = $this->db->prepare($request);
        $id = $dico->id;
        $registration = $dico->registration;
        $colour = $dico->colour;
        $make = $dico->make;
        $model = $dico->model;
        $sth->bindParam(':id', $id);
        $sth->bindParam(':registration',  $registration);
        $sth->bindParam(':colour', $colour);
        $sth->bindParam(':make',  $make);
        $sth->bindParam(':model', $model);
        return $sth->execute();
        // foreach ($dico as $key => $value) {
        //     switch ($key) {
        //         case 'id':
        //             $id = $value;
        //             break;
        //         case 'registration':
        //             $request = "UPDATE cartable SET registration = :value WHERE id = :id";
        //             $sth = $this->db->prepare($request);
        //             $sth->bindParam(':id', $id);
        //             $sth->bindParam(':value', $value);
        //             return $sth->execute();
        //             break;
        //         case 'colour':
        //             $request = "UPDATE cartable SET colour = :value WHERE id = :id";
        //             $sth = $this->db->prepare($request);
        //             $sth->bindParam(':id', $id);
        //             $sth->bindParam(':value', $value);
        //             return $sth->execute();
        //             break;
        //         case 'make':
        //             $request = "UPDATE cartable SET make = :value WHERE id = :id";
        //             $sth = $this->db->prepare($request);
        //             $sth->bindParam(':id', $id);
        //             $sth->bindParam(':value', $value);
        //             return $sth->execute();
        //             break;
        //         case 'model':
        //             $request = "UPDATE cartable SET model = :value WHERE id = :id";
        //             $sth = $this->db->prepare($request);
        //             $sth->bindParam(':id', $id);
        //             $sth->bindParam(':value', $value);
        //             return $sth->execute();
        //             break;
        //         default:
        //             # code...
        //             break;
        //     }
    }

    // public function checkCarStatus($id){
    //     $stmt = $pdo->prepare("SELECT * FROM cartable WHERE id=?");
    //     $stmt->execute([$id])
    //     $user = $stmt->fetch();
    //     if checkCarStatus($id) {
    //         echo "car already exists"
    //     } else {
    //         echo "car doesnt exist";
    //     } 
    // }



    // public function modifyRow($dico)
    // {
    //     foreach ($dico as $key => $value) {
    //         switch ($key) {
    //             case 'registration':
    //                 $z = $this->setRegistration($value);
    //                 $z = $this->getRegistration();
    //                 return $z;
    //                 break;
    //             case 'colour':
    //                 $z = $this->setColour($value);
    //                 $z = $this->getColour();
    //                 return $z;
    //                 break;
    //             case 'make':
    //                 $z = $this->setMake($value);
    //                 $z = $this->getMake();
    //                 return $z;
    //                 break;
    //             case 'model':
    //                 $z = $this->setModel($value);
    //                 $z = $this->getModel();
    //                 return $z;
    //                 break;
    //             default:
    //                 # code...
    //                 break;
    //         }
    //     }
    // }
// }
