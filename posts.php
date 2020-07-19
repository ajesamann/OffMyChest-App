<?php 
include 'config/config.php'; 
include 'includes/handlers/submit_post_handler.php';
include 'includes/post_class.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/posts.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>OffMyChest</title>
</head>
<body>
<script>
        $(document).ready(function() {
                //like button function
                $('.like').click(function() {
                    var post_id = $(this).attr('post-id');
                    $.ajax({
                        type: "POST",
                        url: 'includes/handlers/like_handler.php',
                        data: "post-id=" + $(this).attr('post-id'),
                        success: function(response)
                        {
                            $('.l-num').each(function(){
                                if($(this).attr('post-id') == post_id){
                                    $(this).html(response);
                                }
                            })
                    }
                });
            });

                //relate button function
                $('.relate').click(function() {
                    var post_id = $(this).attr('post-id');
                    $.ajax({
                        type: "POST",
                        url: 'includes/handlers/relate_handler.php',
                        data: "post-id=" + $(this).attr('post-id'),
                        success: function(response)
                        {
                            $('.r-num').each(function(){
                                if($(this).attr('post-id') == post_id){
                                    $(this).html(response);
                                }
                            })
                    }
                });
            });

            //downvote button function
            $('.downvote').click(function() {
                    var post_id = $(this).attr('post-id');
                    $.ajax({
                        type: "POST",
                        url: 'includes/handlers/downvote_handler.php',
                        data: "post-id=" + $(this).attr('post-id'),
                        success: function(response)
                        {
                            $('.d-num').each(function(){
                                if($(this).attr('post-id') == post_id){
                                    $(this).html(response);
                                }
                            })
                    }
                });
            });
        });

        //prevent form resubmission
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }

        if($('.no-posts').css("display") == "block"){
            $('.posts-wrapper').css("height", '100vh');
        }
    </script>
<!-- body content -->
    <div class="content-wrapper">
        <div class="posts-wrapper">
            <a href="index.php"><div class="logo-posts">OffMyChest <i class="fa fa-comment" aria-hidden="true"></i></div></a>
            <div class="welcome">Welcome to the OffMyChest forums</div>
            <div class="username-msg"></div>
            <div class="sort-posts">Sort posts <i class="fa fa-caret-down" aria-hidden="true"></i></div>
            <form class="new-post" method="POST" action="posts.php">
                <input type="text" class="post-input-title" name="submit-post-title" placeholder="Title your post">
                <div class="bottom-post">
                    <textarea name="submit-post-text" id="new-post" placeholder="Get it off your chest!"></textarea>
                    <input type="submit" id="submit-post-btn" name="submit-post" value="Post">
                </div>
            </form>
            <?php
                $post = new Post($conn);
                $post = $post->getPostInfo();

                
                echo $post;
            ?>
        </div>
    </div>
<!-- body content -->
<?php include './includes/footer.php'?>