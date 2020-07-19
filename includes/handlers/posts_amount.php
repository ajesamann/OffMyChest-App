<?php

include '../../config/config.php';

$post_detail_query = mysqli_query($this->conn, "SELECT * FROM posts");
$total_posts = mysqli_num_rows($post_detail_query);

echo $total_posts;

?>