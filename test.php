<?php
require 'voiture.php';
$r = new Voiture();
$r->setId("62");
$r->setRegistration("test");
$r->setMake("test");
$r->setModel("test");
$r->setColour("test");
echo $r->modifyRow($r);
