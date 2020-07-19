<?php include 'config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>OffMyChest</title>
</head>
<body>
    <script>
        //show the pop ups for app info
        $( document ).ready(function() {
            $('.about, .x').click(function(){
                $('.app-info-text').fadeToggle();
                if($('.app-guidelines-text').css('display') == 'block'){
                    $('.app-guidelines-text').fadeOut();
                }
            })

            $('.guidelines, .x2').click(function(){
                $('.app-guidelines-text').fadeToggle();
                if($('.app-info-text').css('display') == 'block'){
                    $('.app-info-text').fadeOut();
                }
            })
        });
    </script>
<!-- body content -->
    <div class="content-wrapper">
        <div class="index-content">
            <div class="top">
                <div class="logo">OffMyChest <i class="fa fa-comment" aria-hidden="true"></i></div>
                <div class="links">
                    <a class="about">How This App Works</a>
                    <a class="guidelines">Community Guidelines</a>
                </div>
            </div>
            <a href="posts.php" class="join-button">
               <span>Enter Forums </span><i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
        <div class="app-info-text">
            <i class="x fa fa-times" aria-hidden="true"></i>
            <div class="info-text">Welcome to OffMyChest! This application allows you to create posts that are completely unfiltered (within our community guidelines). Nobody can comment on your post, and posts cannot be deleted unless they are downvoted 20 times, in which they will be auto deleted. Upon entering the forums, you are allowed to create posts, and interact with other posts. Posts are automatically deleted after 7 days have gone by since the post date. Relax and get it off your chest!</div>
        </div>
        <div class="app-guidelines-text">
            <i class="x2 fa fa-times" aria-hidden="true"></i>
            <div class="guide-text">While there are no rules, we would love if you all kept it fairly clean. No weird stuff. Downvotes control the app, so if you don't like a post just downvote it and if it hits 20, the post will be deleted automatically. The people control this app!</div>
        </div>
    </div>
<!-- body content -->
<?php include './includes/footer.php'?>