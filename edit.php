<?php
    session_start();
    include("con.php");
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $sql = "SELECT * FROM posts WHERE post_id=$id";
        $record = mysqli_query($con,$sql);

        while($res = mysqli_fetch_array($record))
        {
            $title = $res['post_title'];
            $content = $res['post_content'];
            $image = $res['post_image'];
        }
    
        $msg = '';

        if(isset($_POST['update']) && !empty($_FILES['file']['name'])){
            //Get data from form
            $id = $_GET['edit'];
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
            $sql = "UPDATE posts SET post_title='$title', post_content='$content', post_time='$time',
            post_image='$file_name'WHERE post_id = '$id'";
            $rs=mysqli_query($con,$sql);
            if ($rs) {
                header('Location: index.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="container" id="form">
            <h2 class="login">Edit Post</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="container">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Title </label>
                        <input type="text" data-validation="length" data-validation-length="min10"
                        name="title_post" class="form-control" placeholder="Title post">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Content </label>
                        <input type="text" data-validation="length" data-validation-length="min10"
                        name="content_post" class="form-control" row="10" placeholder="Content post">
                    </div>
                    <div class="form-group">    
                        <label for="exampleInputEmail1"> Image </label>
                        <input name="file" type="file" class="form-control">
                    </div>
                </div>
                <button type="submit" name="update" class="btn btn-info">Update</button>
            </form>
        </div>
    </div>
</body>
</html>