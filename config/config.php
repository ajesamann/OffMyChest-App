<?php

//connecting to the database

$dbhost = "us-cdbr-east-02.cleardb.com";
$dbuser = "b96af2ae2106ff";
$dbpass = "7bc743ba";
$db = "heroku_956110044e7cd6a";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

if(!$conn){
    echo "Cannot connect to the database -> " . mysqli_connect_error();
}

if(!isset($_SESSION)){
    session_start();

 /**$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "OffMyChest";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

 if(!$conn){
     echo "Cannot connect to the database -> " . mysqli_connect_error();
 }

 if(!isset($_SESSION)){
     session_start();
 }**/


?>