<?php
require_once 'voiture.php';
$test = new Voiture();
$test->addNew();
$all = $test->findALL();
$test->encodeJson();
// var_dump($test);
var_dump($test->decodeJson());
