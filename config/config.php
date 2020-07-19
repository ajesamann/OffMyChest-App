<?php

//connecting to the database
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "OffMyChest";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

 if(!$conn){
     echo "Cannot connect to the database -> " . mysqli_connect_error();
 }

 if(!isset($_SESSION)){
     session_start();
 }


?>