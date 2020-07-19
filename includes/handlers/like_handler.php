<?php
include '../../config/config.php';

 $user_id = $_SESSION['user-id'];

//grab the post-id from the ajax call
 $post_id = $_POST['post-id'];
 //query the database for post likes
 $post_detail_query = mysqli_query($conn, "SELECT likes FROM posts WHERE post_id=$post_id");
 //fetch the likes and set it = to the row variable
 $row = mysqli_fetch_array($post_detail_query);
 $likes = $row['likes'];
 
 //if user has liked this post already, query the database and subtract 1 and remove the post from their liked posts, if they havent liked it, query the database and add 1 also add the post-id to the list of posts theyve liked
 //grab users liked posts
 $user_query = mysqli_query($conn,"SELECT posts_liked FROM users WHERE user_id=$user_id");
 $user_row = mysqli_fetch_array($user_query);
 $posts_liked = $user_row['posts_liked'];

 if(strstr($posts_liked, $post_id . ",")){
    $subtract_query = mysqli_query($conn, "UPDATE posts SET likes=$likes - 1 WHERE post_id=$post_id");
    $new_post_array = str_replace($post_id . ",", "", $posts_liked);
    $remove_post = mysqli_query($conn, "UPDATE users SET posts_liked='$new_post_array' WHERE user_id=$user_id");
 }else{
    $liked_posts = $post_id . ",";
    $add_to_liked_posts = mysqli_query($conn, "UPDATE users SET posts_liked=CONCAT(posts_liked, '$liked_posts') WHERE user_id=$user_id");
    $add_query = mysqli_query($conn, "UPDATE posts SET likes=$likes + 1 WHERE post_id=$post_id");
 }

 //grab that row from the database and return the live likes
 $updated_post_likes = mysqli_query($conn, "SELECT likes FROM posts WHERE post_id=$post_id");
 $updatedRow = mysqli_fetch_array($updated_post_likes);
 $updatedLikes = $updatedRow['likes'];

 echo $updatedLikes;
?>