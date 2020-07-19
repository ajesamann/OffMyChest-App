<?php
include '../../config/config.php';

//create a new user and insert it into the database
$create_user_query = mysqli_query($conn, "INSERT INTO users VALUES ('0', ',', ',', ',')");

//now query the database for the users and set the session variable equal to the id of the user just created
$find_user_query = mysqli_query($conn, "SELECT * FROM users ORDER BY user_id DESC LIMIT 1");
$row = mysqli_fetch_array($find_user_query);

//set the user id
$user_id = $row['user_id'];


$_SESSION['user-id'] = $user_id;

header("Location: ../../posts.php?user-id=" . $_SESSION['user-id']);
?>