<?php 
require 'app/database/connect.php';

if(isset($_GET['like'])){
  $id = mysqli_escape_string($conn,$_GET['like']);
  $select_likes = "SELECT  `likes` FROM `posts` WHERE `id`='$id'";
  $my_likes = mysqli_query($conn,$select_likes);
  $current_likes = "";
  while ($row = mysqli_fetch_assoc($my_likes)) {
    extract($row);
    $current_likes = $likes;
  }

  $incremented_likes = $current_likes+1;

  $add_likes = "UPDATE `posts` SET `likes`='$incremented_likes' WHERE `id` = '$id'";
  $like = mysqli_query($conn,$add_likes);
  if ($add_likes) {
    header("location:index.php");
  }else{
    echo "failed".$incremented_likes;
  }
}
?>