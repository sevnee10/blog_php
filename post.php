
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
            <h2 class="login">Add A Post</h2>
            <form action="post_a.php" method="POST" enctype="multipart/form-data">
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
                <button type="submit" name="addpost" class="btn btn-info">Add post</button>
            </form>
        </div>
    </div>
</body>
</html>