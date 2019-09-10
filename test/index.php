<?php
require_once "../src/resources/Connection.php";
require_once "../src/resources/FacultyRepository.php";

$faculty =new Faculty();
$faculty->id=2;
$faculty->shortname="HUD";

//TODO ZKUSIT DEEP
////echo FacultyRepository::create($faculty);
//var_dump(FacultyRepository::read(2));
//FacultyRepository::update($faculty);
//echo "<br><br>"
//;
//var_dump(FacultyRepository::read(2));

FacultyRepository::delete(2);
var_dump(FacultyRepository::readAll());