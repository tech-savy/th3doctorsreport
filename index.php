<?php 
include("path.php");
include(ROOT_PATH . "/app/controllers/topics.php");

$posts = array();
$postsTitle = 'Recent Posts';

if (isset($_GET['t_id'])) {
  $posts = getPostsByTopicId($_GET['t_id']);
  $postsTitle = "You searched for posts under '" . $_GET['name'] . "'";
} else if (isset($_POST['search-term'])) {
  $postsTitle = "You searched for '" . $_POST['search-term'] . "'";
  $posts = searchPosts($_POST['search-term']);
} else {
  $posts = getPublishedPosts();
}

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
  <meta name="google-site-verification" content="N-10wgocTSQuxvYK-f0nLmHKVp5UyPV5K_gcfmwYR0s" />

   <!-- Favicons -->
   <link href="assets/images/favicon.jpg" rel="icon">
  <link href="assets/images/favicon.jpg" rel="apple-touch-icon">
  <link rel="shortcut icon" href="">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/css/vendor.css">
  <link rel="stylesheet" href="assets/css/styling.css">

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172077963-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-172077963-1');
</script>


  <title>Th3 Doctor's Report</title>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PGRMP32"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

  <section id="hero1"></section>




  <!--homepage hero-->
	<section id="hero">
		<div class="row hero-content">
			<div class="twelve columns hero-container">

        <!-- ======= Hero Section ======= -->
    <div class="hero-container" data-aos="fade-up">
      <h5> Giving you an in-depth diagnosis of East African basketball and its culture. We report, support and create
            quality content. 
</h5>
    </div>
  
			</div> <!-- end twelve columns-->
		</div> <!-- end row -->
		<div id="more">
			<!-- <a class="smoothscroll" href="#section">More About Us></a>  -->
		</div>
  </section> <!-- end homepage hero -->
  

  <!-- Page Wrapper -->
  <div class="page-wrapper">

    <!-- Post Slider -->
    <div class="post-slider">
      <h1 class="slider-title">Quick Posts</h1>
      <i class="fas fa-chevron-left prev"></i>
      <i class="fas fa-chevron-right next"></i>

      <div class="post-wrapper">

        <!-- <?php foreach ($posts as $post): ?>
          
        <?php endforeach; ?> -->

        <?php
          $select_images = "select * from posts where published = 1";
          $images = mysqli_query($conn,$select_images);
          while ($row = mysqli_fetch_assoc($images)) {
            extract($row);
            echo '
            <div class="post">
            <img src="assets/images/'.$image.'" alt="" class="slider-image">
            <div class="post-info">
              <h4><a href="single.php?id='.$id.'">'.$title.'</a></h4>
              <i class="far fa-user">'.$username.'</i>
              &nbsp;
              <i class="far fa-calendar">'.date('F j, Y', strtotime($created_at)).'</i>   <br><br>         
              <a href="like.php?like='.$id.'"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
              <label style="color: #fff; margin-left: 10px;">'.$likes.'</label>

              
              <i class="fa fa-eye" aria-hidden="true" style="margin-left: 20px;"></i>
              <label style="color: #fff; margin-left: 10px;">'.$views.'</label>
              

              <i class="fa fa-comment" aria-hidden="true"  style="margin-left: 30px;"></i>              
              <label style="color: #fff; margin-left: 10px;"></label>
            </div>
          </div>
            ';
          }
        ?>




      </div>

    </div>
    <!-- // Post Slider -->

    <!-- Content -->
    <div class="content clearfix">

      <!-- Main Content -->
      <div class="main-content">
        <h1 class="recent-post-title">Recent posts</h1>
      <?php
      $select_posts = "select * from posts where published = 1";
      $the_posts = mysqli_query($conn,$select_posts);
      while ($row = mysqli_fetch_assoc($the_posts)) {
        extract($row);
        echo '
        

          <div class="post clearfix">
            <img src="assets/images/'.$image.'" alt="" class="post-image">
            <div class="post-preview">
              <h2><a href="single.php?id='.$id.'">'.$title.'</a></h2>
              <i class="far fa-user">'. $username.'</i>
              &nbsp;
              <i class="far fa-calendar"> '.date('F j, Y', strtotime($created_at)).'</i>
              <p class="preview-text">
                '. html_entity_decode(substr($body, 0, 150) . '...').'
              </p>
              <a href="single.php?id='.$id.'" class="btn read-more">Read More</a>
            </div>
          </div>    
      
        ';
      }
      ?>
      </div>
      <!-- // Main Content -->

      <div class="sidebar">

        <div class="section search">
          <h2 class="section-title">Search</h2>
          <form action="index.php" method="post">
            <input type="text" name="search-term" class="text-input" placeholder="Search...">
          </form>
        </div>


        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>
            <?php foreach ($topics as $key => $topic): ?>
              <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>

      </div>

    </div>
    <!-- // Content -->

  </div>
  <!-- // Page Wrapper -->

  <div id="go-top">
				<a class="smoothscroll btn read-more" title="Back to Top" href="#hero1">Back to Top<i class="fa fa-angle-up"></i></a>
			</div>

 <!--
  <div id="preloader">
		<div id="loader"></div>
	</div>
-->


  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>