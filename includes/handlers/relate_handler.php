<?php
include '../../config/config.php';

$user_id = $_SESSION['user-id'];

//grab the post-id from the ajax call
 $post_id = $_POST['post-id'];
 //query the database for post relates
 $post_detail_query = mysqli_query($conn, "SELECT relates FROM posts WHERE post_id=$post_id");
 //fetch the relates and set it = to the row variable
 $row = mysqli_fetch_array($post_detail_query);
 $relates = $row['relates'];


  //if user has related this post already, query the database and subtract 1 and remove the post from their liked posts, if they havent liked it, query the database and add 1 also add the post-id to the list of posts theyve liked
 //grab users related posts
 $user_query = mysqli_query($conn,"SELECT posts_related FROM users WHERE user_id=$user_id");
 $user_row = mysqli_fetch_array($user_query);
 $posts_related = $user_row['posts_related'];

 if(strstr($posts_related, $post_id . ",")){
    $subtract_query = mysqli_query($conn, "UPDATE posts SET relates=$relates - 1 WHERE post_id=$post_id");
    $new_post_array = str_replace($post_id . ",", "", $posts_related);
    $remove_post = mysqli_query($conn, "UPDATE users SET posts_related='$new_post_array' WHERE user_id=$user_id");
 }else{
    $related_posts = $post_id . ",";
    $add_to_related_posts = mysqli_query($conn, "UPDATE users SET posts_related=CONCAT(posts_related, '$related_posts') WHERE user_id=$user_id");
    $add_query = mysqli_query($conn, "UPDATE posts SET relates=$relates + 1 WHERE post_id=$post_id");
 }


 //update the relates on the post by 1 and query the database for the updated row
 $updated_post_relates = mysqli_query($conn, "SELECT relates FROM posts WHERE post_id=$post_id");
 $updatedRow = mysqli_fetch_array($updated_post_relates);
 $updatedRelates = $updatedRow['relates'];

 

 echo $updatedRelates;
?>