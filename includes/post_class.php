<?php

 class Post{

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
        
    }

    //query the database and grab the info for each post if there is a post
    public function getPostInfo(){
        $post_detail_query = mysqli_query($this->conn, "SELECT * FROM posts");
        $total_posts = mysqli_num_rows($post_detail_query);
        
        if($total_posts > 0){
            while($row = mysqli_fetch_array($post_detail_query)){
                $post_title = $row['title'];
                $post_body = $row['body'];
                $post_date = $row['date_posted'];
                $post_likes = $row['likes'];
                $post_relates = $row['relates'];
                $post_downvotes = $row['downvotes'];
                $post_id = $row['post_id'];

                $post = "<div class='posts-container'>
                            <div class='main-post'>
                                <div class='post-title'>$post_title</div>
                                <div class='post-body'>$post_body</div>
                                <div class='post-info-container'>
                                    <div class='post-buttons'>
                                        <i id='like' post-id=$post_id class='like fas fa-heart'></i>
                                        <i id='relate' post-id=$post_id class='relate fas fa-hand-peace'></i>
                                        <i id='downvote' post-id=$post_id class='downvote fas fa-trash'></i>
                                    </div>
                                    <div class='post-stats'>
                                        <div class='like-stat'><span post-id=$post_id class='l-num'>$post_likes</span> Like(s)</div>
                                        <div class='relate-stat'><span post-id=$post_id class='r-num'>$post_relates</span> People can relate</div>
                                        <div class='downvote-stat'><span post-id=$post_id class='d-num'>$post_downvotes</span> Downvote(s)</div>
                                    </div>
                                </div>
                            </div>
                        </div>";

                echo $post;
            }
        }else{
            echo "<div class='no-posts'>There's no more posts! Post something!</div>";
        }
    }

 }

?>