<?php 
    session_start();
    include('con.php');
    $msg = '';

    if(isset($_POST['addpost']) && !empty($_FILES['file']['name'])){
        //Get data from form
        $title = mysqli_real_escape_string($con,$_POST['title_post']);
        $content = mysqli_real_escape_string($con,$_POST['content_post']);
        $time = date('Y-m-d');
        $file_name = $_FILES['file']['name'];
        $targerDir = "./uploads/".$_FILES['file']['name'];
        // $a = move_uploaded_file($_FILES['file']['tmp_name'],$targerDir);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$targerDir)){
            $msg = "Post successfully";
        }else{
            $msg = "Post failed";
        }
        $sql = "INSERT INTO posts(post_title,post_content,post_image,post_time) 
        VALUES ('$title','$content','".$_FILES['file']['name']."','$time')";
        // var_dump($sql).die();
        $rs=mysqli_query($con,$sql);
        if ($rs) {
            header('Location: index.php');
        }
    }
?>
