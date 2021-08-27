<?php
require_once 'classes/voiture.php';
$voiture = new Voiture();

$resultat = "";

if (isset($_GET['fonction'])) {
    $result =  $_GET['fonction'];
    switch ($result) {
        case "findALL":
            $resultat = $voiture->findALL();
            break;
        case 'deleteRow':
            $r = $_GET['variable'];
            $resultat = $voiture->deleteRow($r);
            break;
        case 'modifyRow':
            $r = $_GET['variable'];
            $resultat = $voiture->modifyRow($r);
            break;
        case 'addNew':
            if (isset($_POST["registration"])) {
                $resultat = $voiture->addNew();
            }
            break;
        case 'getID':
            $resultat = $voiture->getlastID();
            break;
        default:
            break;
    }
}
echo json_encode($resultat);
