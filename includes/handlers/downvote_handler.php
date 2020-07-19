<?php
include '../../config/config.php';

$user_id = $_SESSION['user-id'];

//grab the post-id from the ajax call
 $post_id = $_POST['post-id'];
 //query the database for post likes
 $post_detail_query = mysqli_query($conn, "SELECT downvotes FROM posts WHERE post_id=$post_id");
 //fetch the downvotes and set it = to the row variable
 $row = mysqli_fetch_array($post_detail_query);
 $downvotes = $row['downvotes'];


   //if user has downvoted this post already, query the database and subtract 1 and remove the post from their liked posts, if they havent liked it, query the database and add 1 also add the post-id to the list of posts theyve liked
 //grab users downvoted posts
 $user_query = mysqli_query($conn,"SELECT posts_downvoted FROM users WHERE user_id=$user_id");
 $user_row = mysqli_fetch_array($user_query);
 $posts_downvoted = $user_row['posts_downvoted'];

 if(strstr($posts_downvoted, $post_id . ",")){
    $subtract_query = mysqli_query($conn, "UPDATE posts SET downvotes=$downvotes - 1 WHERE post_id=$post_id");
    $new_post_array = str_replace($post_id . ",", "", $posts_downvoted);
    $remove_post = mysqli_query($conn, "UPDATE users SET posts_downvoted='$new_post_array' WHERE user_id=$user_id");
 }else{
    $downvoted_posts = $post_id . ",";
    $add_to_downvoted_posts = mysqli_query($conn, "UPDATE users SET posts_downvoted=CONCAT(posts_downvoted, '$downvoted_posts') WHERE user_id=$user_id");
    $add_query = mysqli_query($conn, "UPDATE posts SET downvotes=$downvotes + 1 WHERE post_id=$post_id");
 }

 //update the downvotes on the post by 1 and query the database for the updated row
 $updated_post_downvotes = mysqli_query($conn, "SELECT downvotes FROM posts WHERE post_id=$post_id");
 $updatedRow = mysqli_fetch_array($updated_post_downvotes);
 $updatedDownvotes = $updatedRow['downvotes'];

 //if the downvotes hit 20, run a query to remove the post from the database
 if($updatedDownvotes == 20){
     $query = mysqli_query($conn, "DELETE FROM posts WHERE post_id=$post_id");
 }

 echo $updatedDownvotes;
?>