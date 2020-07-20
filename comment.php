<?php 
require 'app/database/connect.php';
session_start();
$username = $_SESSION['username'];


if(isset($_POST['btn_comment'])){
  $id = mysqli_escape_string($conn,$_POST['id']);
  $comment = mysqli_real_escape_string($conn,$_POST['comment']);

  $add_comment_query = "INSERT INTO `comments`(`id`, `post_id`, `comment`, `username`) VALUES (null,'$id','$comment','$username')";
  $save_comment = mysqli_query($conn,$add_comment_query);
  if ($save_comment) {
    header("location:single.php?id=$id");
  }else{
    echo "failed";
  }
}
?>