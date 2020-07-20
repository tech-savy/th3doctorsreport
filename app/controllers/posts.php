<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");
require ROOT_PATH . "/app/database/connect.php";

$table = 'posts';

$topics = selectAll('topics');
$posts = selectAll($table);


$errors = array();
$id = "";
$title = "";
$body = "";
$topic_id = "";
$published = "";

if (isset($_GET['id'])) {
    $post = selectOne($table, ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $topic_id = $post['topic_id'];
    $published = $post['published'];
}

if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "Post deleted successfully";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/posts/index.php"); 
    exit();
}

if (isset($_GET['published']) && isset($_GET['p_id'])) {
    adminOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    $count = update($table, $p_id, ['published' => $published]);
    $_SESSION['message'] = "Post published state changed!";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/posts/index.php"); 
    exit();
}



if (isset($_POST['add-post'])) {
    adminOnly();
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {

        $image_name = time() . '_' . $_FILES['image']['name'];
        $image_name1 = time() . '_' . $_FILES['image1']['name'];
        $image_name2 = time() . '_' . $_FILES['image2']['name'];
        $image_name3 = time() . '_' . $_FILES['image3']['name'];


        $destination = ROOT_PATH . "/assets/images/" . $image_name;
        $destination1 = ROOT_PATH . "/assets/images/" . $image_name1;
        $destination2 = ROOT_PATH . "/assets/images/" . $image_name2;
        $destination3 = ROOT_PATH . "/assets/images/" . $image_name3;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        $result1 = move_uploaded_file($_FILES['image1']['tmp_name'], $destination1);
        $result2 = move_uploaded_file($_FILES['image2']['tmp_name'], $destination2);
        $result3 = move_uploaded_file($_FILES['image3']['tmp_name'], $destination3);


        if ($result or $result1 or $result2 or $result3) {
           $_POST['image'] = $image_name;
           $_POST['image1'] = $image_name1;
           $_POST['image2'] = $image_name2;
           $_POST['image3'] = $image_name3;
        


        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
       array_push($errors, "Post image required");
    }
    if (count($errors) == 0) {
        unset($_POST['add-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);
    
        // $post_id = create($table, $_POST);
            $date = date("Y-m-d")." ".date("h:i:s");

            $save_data = "INSERT INTO `posts`(`id`,`title`,`topic_id`, `image`, `image1`, `image2`, `image3`, `body`, `published`, `created_at`, `likes`, `views`) 
            VALUES (null,'$title','$topic_id','$image_name','$image_name1','$image_name2','$image_name3','$body','$date','$date','0','0')";
            mysqli_query($conn,$save_data);
        $_SESSION['message'] = "Post created successfully";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/posts/index.php"); 
        exit();    
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
}


if (isset($_POST['update-post'])) {
    adminOnly();
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $image_name1 = time() . '_' . $_FILES['image1']['name'];
        $image_name2 = time() . '_' . $_FILES['image2']['name'];
        $image_name3 = time() . '_' . $_FILES['image3']['name'];

        $destination = ROOT_PATH . "/assets/images/" . $image_name;
        $destination1 = ROOT_PATH . "/assets/images/" . $image_name1;
        $destination2 = ROOT_PATH . "/assets/images/" . $image_name2;
        $destination3 = ROOT_PATH . "/assets/images/" . $image_name3;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        $result1 = move_uploaded_file($_FILES['image1']['tmp_name'], $destination1);
        $result2 = move_uploaded_file($_FILES['image2']['tmp_name'], $destination2);
        $result3 = move_uploaded_file($_FILES['image3']['tmp_name'], $destination3);

        if ($result) {
           $_POST['image'] = $image_name;
           $_POST['image1'] = $image_name1;
           $_POST['image2'] = $image_name2;
           $_POST['image3'] = $image_name3;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
       array_push($errors, "Post image required");
    }

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-post'], $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);
    
        $post_id = update($table, $id, $_POST);
        $_SESSION['message'] = "Post updated successfully";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/posts/index.php");       
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
}




