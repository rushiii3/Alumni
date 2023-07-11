<?php
/*
$dbhost="localhost";
$password="Vaze-androidapp-1";
$username="id20794141_alumniandroidapp";
$dbname="id20794141_alumni";
*/
$dbhost="localhost";
$password="";
$username="";
$dbname="";

$conn=new mysqli($dbhost,$username,$password,$dbname);
if(mysqli_connect_error()){
    die("Unable to connect to database. " . mysqli_connect_error());
}




?>