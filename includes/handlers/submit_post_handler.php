<?php

require 'config/config.php';

$error_array = array();
$success_array = array();

//when the post button is pressed, push the post into the database along with other variables
if(isset($_POST['submit-post'])){
    $new_post_title = strip_tags($_POST['submit-post-title']);
    $new_post_body = strip_tags($_POST['submit-post-text']);
    $date = date("Y-m-d");
    $date_time_now = date("Y-m-d H:i:s");

    //if the title and body of the post submit form aren't empty, then push the post into the database
    if(strlen($new_post_body) > 0 && strlen($new_post_title) > 0){
       $query = mysqli_query($conn, "INSERT INTO posts VALUES ('0', '$new_post_title', '$new_post_body', '0', '0', '0', '$date')");
    }else{
        return;
    }
}

?>