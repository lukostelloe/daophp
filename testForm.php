<?php
require_once 'voiture.php';
require_once 'index.php';
$test->addNew();
$all = $test->findALL();
$test->encodeJson();
