<?php
require_once "../src/resources/Connection.php";
require_once "../src/resources/FacultyRepository.php";

$faculty =new Faculty();
$faculty->id=4;
$faculty->name="kdjsnckjn";
$faculty->shortname="HUn";
$faculty->color="#202120";
$faculty->logo_id=1;

//TODO ZKUSIT DEEP

var_dump(FacultyRepository::read(1));