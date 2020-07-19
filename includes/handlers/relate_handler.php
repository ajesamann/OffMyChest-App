<?php
include '../../config/config.php';


//grab the post-id from the ajax call
 $post_id = $_POST['post-id'];
 //query the database for post likes
 $post_detail_query = mysqli_query($conn, "SELECT relates FROM posts WHERE post_id=$post_id");
 //fetch the relates and set it = to the row variable
 $row = mysqli_fetch_array($post_detail_query);
 $relates = $row['relates'];

 //update the relates on the post by 1 and query the database for the updated row
 $relate_query = mysqli_query($conn, "UPDATE posts SET relates=$relates + 1 WHERE post_id=$post_id");
 $updated_post_relates = mysqli_query($conn, "SELECT relates FROM posts WHERE post_id=$post_id");
 $updatedRow = mysqli_fetch_array($updated_post_relates);
 $updatedRelates = $updatedRow['relates'];

 

 echo $updatedRelates;
?>