<?php
include '../../config/config.php';


//grab the post-id from the ajax call
 $post_id = $_POST['post-id'];
 //query the database for post likes
 $post_detail_query = mysqli_query($conn, "SELECT likes FROM posts WHERE post_id=$post_id");
 //fetch the likes and set it = to the row variable
 $row = mysqli_fetch_array($post_detail_query);
 $likes = $row['likes'];

 //update the likes on the post by 1 and query the database for the updated row
 $like_query = mysqli_query($conn, "UPDATE posts SET likes=$likes + 1 WHERE post_id=$post_id");
 $updated_post_likes = mysqli_query($conn, "SELECT likes FROM posts WHERE post_id=$post_id");
 $updatedRow = mysqli_fetch_array($updated_post_likes);
 $updatedLikes = $updatedRow['likes'];

 

 echo $updatedLikes;
?>