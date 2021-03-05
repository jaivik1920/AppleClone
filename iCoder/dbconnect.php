<?php

$server="localhost";
$user="root";
$pass="";
$db="iCoder";

$conn = new mysqli($server, $user, $pass,$db);

if(!$conn){
    die("Connection error!!!");
}

?>