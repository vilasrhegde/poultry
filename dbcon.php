<?php

$server="localhost";
$username="root";
$password="";
$database="poultry_db";


$link=mysqli_connect($server,$username,$password,$database);

if(!$link){
    die("Connection to database failed!:" .mysqli_connect_error());
}

?>