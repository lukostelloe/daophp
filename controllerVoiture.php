<?php
require_once 'voiture.php';
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
                $voiture->addNew();
            }
            break;
        default:
            break;
    }
}
echo json_encode($resultat);
