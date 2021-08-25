<?php
require_once 'voiture.php';
$test = new Voiture();
$test->addNew();
$all = $test->findALL();
$test->decodeJson($test);
