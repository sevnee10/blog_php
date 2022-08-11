<?php 
    session_start();
    $showAlert = false; 
    $showError = false; 
    $exists=false;
    // Register user
    if(isset($_POST['signup'])){
        include('con.php');
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['psw']);
        $confirm_password = mysqli_real_escape_string($con,$_POST['confirm_psw']);  

        $sql = "SELECT * FROM users WHERE user_email='$email'";
        $result = mysqli_query($con,$sql);
        $num = mysqli_num_rows($result); 
        
        // This sql query is use to check if the user_email is already present or not in our Database

        if($num == 0) {
            if(($password == $confirm_password) && $exists==false) {

                $hash = password_hash($password, PASSWORD_DEFAULT);
                
                // Password Hashing is used here. 
                $sql_query = "INSERT INTO users (user_email, user_password) VALUES ('$email', '$hash')";
                $rs = mysqli_query($con, $sql_query);
                if ($rs) {
                    $showAlert = true; 
                    header('Location: login.php');
                }
            } else { 
                $showError = "Passwords do not match"; 
            }      
        }
        if($num>0) 
        {
            $exists="Email not available"; 
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
    <title>Register Page</title>
</head>

<body>
    <div class="wrapper">
        <div class="container" id="form">
            <h2 class="register">Register</h2>
            <p class="fill">Please fill in this form to create an account.</p>
            <hr>
            <form action="register.php" method="POST">
                <div class="container">
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email" required>
                    </div>
                    <div class="form-group"> 
                    <label for="psw-repeat"><b>Password</b></label>
                    <input type="password" placeholder="Password" name="psw" id="password" required>
                    </div>

                    <div class="form-group"> 
                    <label for="psw-repeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="confirm_psw" id="psw-repeat" required>
                    </div>

                    <hr>
                    <p>By creating an account you agree to our <a class="tp" href="#">Terms & Privacy</a>.</p>
                    <button type="submit" name="signup" class="registerbtn">Register</button>
                </div>
                <div class="container signin">
                    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
                </div>
                </form>

        </div>
    </div>
</body>

</html>