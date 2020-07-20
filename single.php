<?php include("path.php"); ?>
<?php include(ROOT_PATH . '/app/controllers/posts.php');
require "app/database/connect.php";


  $id = mysqli_escape_string($conn,$_GET['id']);
  $select_views = "SELECT  `views` FROM `posts` WHERE `id`='$id'";
  $my_views = mysqli_query($conn,$select_views);
  $current_views = "";
  while ($row = mysqli_fetch_assoc($my_views)) {
    extract($row);
    $current_views = $views;
  }

  $incremented_views = $current_views+1;

  $add_views = "UPDATE `posts` SET `views`='$incremented_views' WHERE `id` = '$id'";
  mysqli_query($conn,$add_views);
  

if (isset($_GET['id'])) {
  $post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PGRMP32');</script>
<!-- End Google Tag Manager -->

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/css/styling.css">
  <style>
      #center{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 99.5%;
  }
  </style>

  <title><?php echo $post['title']; ?> | Th3 Doctors' Report</title>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PGRMP32"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <!-- Facebook Page Plugin SDK -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=285071545181837&autoLogAppEvents=1">
  </script>

  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

  <!-- Page Wrapper -->
  <div class="page-wrapper">

    <!-- Content -->
    <div class="content clearfix">

      <!-- Main Content Wrapper -->
      <div class="main-content-wrapper">
        <div class="main-content single">
          <h1 class="post-title"><?php echo $post['title']; ?></h1>
          <div class="post-content">
          </div>     
               <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image" id="center" height="320px" width="330px" >
               <?php echo html_entity_decode($post['body']); ?>
                        <form action="comment.php" method="post">
                              <div>
                                  <label>Leave a comment</label>
                                  <input type="hidden" name="id" value="<?php echo $post['id'];  ?>">
                                  <?php

                                  $input_field = '';
                                  $button_message = "";
                                    
                                  if (isset($_SESSION['user'])) {
                                    $button_message = "Post";
                                    $input_field = '<input type="text" name="comment" value="" class="text-input" required>';
                                  }else{
                                    $button_message = "You must be a logged in user to comment!";
                                    $input_field = '<input type="text" name="comment" value="" class="text-input" required disabled>';
                                  }
                                  echo $input_field;  
                                  ?>
                                  
                              </div>
                              <br>
                              <div>
                                  <button type="submit" name="btn_comment" class="btn btn-big"><?php echo $button_message; ?></button>
                                  <?php
                                    if (isset($_SESSION['user'])) {
                                    $id = $post['id'];
                                    $select_comments = "select * from comments where post_id='$id' order by id desc";
                                    $comments = mysqli_query($conn,$select_comments);
                                    echo "<p style='color: black;'>Comments</p>";
                                    while ($row = mysqli_fetch_assoc($comments)) {
                                      extract($row);
                                      echo "<i class=\"fa fa-user\" aria-hidden=\"true\"></i> $username<p style='color: gray;'>$comment</p>";
                                    }
                                  }
                                
                                  ?>
                              </div>
                        </form>
                      
                        <div style="padding: 2px; margin-top: 5px;"></div>


                       
        </div>
      </div>
      <!-- // Main Content -->

      <!-- Sidebar -->
      <div class="sidebar single">

        <div class="fb-page" data-href="https://twitter.com/th3_docs_report?s=20" data-small-header="false"
          data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <blockquote cite="https://twitter.com/th3_docs_report?s=20" class="fb-xfbml-parse-ignore"><a
              href="https://twitter.com/th3_docs_report?s=20">Social Media</a></blockquote>
        </div>


        <div class="section popular">
          <h2 class="section-title">Popular</h2>

          <?php foreach ($posts as $p): ?>
            <div class="post clearfix">
              <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
              <a href="" class="title">
                <h4><?php echo $p['title'] ?></h4>
              </a>
            </div>
          <?php endforeach; ?>
          

        </div>

        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>
            <?php foreach ($topics as $topic): ?>
              <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
            <?php endforeach; ?>

          </ul>
        </div>
      </div>
      <!-- // Sidebar -->

    </div>
    <!-- // Content -->

  </div>
  <!-- // Page Wrapper -->

  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>

</body>

</html>