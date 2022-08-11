<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Art.Design Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <!-- header -->
    <header>
      <nav class = "navbar">
        <div class = "container">
          <a href = "index.html" class = "navbar-brand">Art.Design</a>
          <div class = "navbar-nav">
            <a href = "">home</a>
            <a href = "post.php">post</a>
            <a href = "">about</a>
          </div>
          <div class="navbar-login">
            <?php
              session_start();
              include('con.php');
              if (isset($_SESSION['email'])){
            ?>   
              <a href="logout.php">Logout</a>
            <?php 
              } else {
            ?>    
              <a href="login.php">Login</a> <span>/</span>
              <a href="register.php">Register</a>
            <?php  
            }
            ?>
            
          </div>
        </div>
      </nav>
      <div class = "banner">
        <div class = "container">
          <h1 class = "banner-title">
            <span>Art.</span> Design Blog
          </h1>
          <p>everything that you want to know about art & design</p>
          <form>
            <input type = "text" class = "search-input" placeholder="find your idea . . .">
            <button type = "submit" class = "search-btn">
              <i class = "fas fa-search"></i>
            </button>
          </form>
        </div>
      </div>
    </header>
    <!-- end of header -->
      
    <!-- design -->
    <?php
      $result = mysqli_query($con, "SELECT * FROM posts");
    ?>
    <section class = "design" id = "design">
      <div class = "container">
        <div class = "title">
          <h2>All posts</h2>
          <p style="color:black;">recent arts & designs on the blog</p>
        </div>
        <div class = "design-content">
          <!-- item -->
          <?php
          while ($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
          }
          foreach ($data as $val){
        ?>    
          <div class = "design-item">
            <div class = "design-img">
              <?php
              echo "<img src='uploads/".$val['post_image']."' >";  
              ?>
              <span><i class = "far fa-heart"></i> 22</span>
              
              <span><?php echo $val['post_title']?></span>
            </div>
            <div class="design-item-ed">
              <a href="edit.php?edit=<?php echo $val['post_id'];?>"><span style="color: green;"><i class="fas fa-edit"></i></span></a>
              <a href="del.php?del=<?php echo $val['post_id'];?>"><span style="color: red;"><i class="fas fa-trash"></i></span></a>
            </div>
            <div class = "design-title">
              <a href = "#"><?php echo $val['post_content']?></a>
            </div>
          </div>
          <?php
          }
        ?>
          <!-- end of item -->
        </div>
      </div>
    </section>
    <!-- end of design -->

    <!-- about -->
    <section class = "about" id = "about">
      <div class = "container">
        <div class = "about-content">
          <div>
            <img src = "images/about-bg.jpg" alt = "">
          </div>
          <div class = "about-text">
            <div class = "title">
              <h2>Catherine Doe</h2>
              <p>art & design is my passion</p>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id totam voluptatem saepe eius ipsum nam provident sapiente, natus et vel eligendi laboriosam odit eos temporibus impedit veritatis ut, illo deserunt illum voluptate quis beatae quod. Necessitatibus provident dicta consectetur labore!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam corrupti natus, eos quia recusandae voluptatem veniam modi officiis minima provident rem sint porro fuga quos tempora ea suscipit vero velit sed laudantium eaque necessitatibus maxime!</p>
          </div>
        </div>
      </div>
    </section>
    <!-- end of about -->

    <!-- footer -->
    <footer>
      <div class = "social-links">
        <a href = "#"><i class = "fab fa-facebook-f"></i></a>
        <a href = "#"><i class = "fab fa-twitter"></i></a>
        <a href = "#"><i class = "fab fa-instagram"></i></a>
        <a href = "#"><i class = "fab fa-pinterest"></i></a>
      </div>
      <span>Art.Design Blog Page</span>
    </footer>
    <!-- end of footer -->
    
    
  </body>
</html>