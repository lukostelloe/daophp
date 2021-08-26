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
            // case 'addNew':
            //     $r = $_GET['variable'];
            //     $voiture->addNew();
            //     break;

        default:
            break;
    }
}

if (isset($_POST["registration"])) {
    $voiture->addNew();
    // echo "OK";
}
// else {
//     echo "KO";
// }

echo json_encode($resultat);
