<?php      
    session_start();
    include('con.php');  
    if (isset($_POST['submit'])){
        //check email and password 
        if(empty($_POST["email"]) || empty($_POST["psw"]))  
        {  
            echo '<script>alert("Both Fields are required")</script>';  
        }else{  
            //Get data post 
            $email = mysqli_real_escape_string($con, $_POST["email"]);  
            $password = mysqli_real_escape_string($con, $_POST["psw"]);  
            $query = "SELECT * FROM users WHERE user_email = '$email'";  
            $result = mysqli_query($con, $query);  

            //return array that you just queried
            $row = mysqli_fetch_array($result);
            //
            if($row)
            {  
                if(password_verify($password, $row["user_password"]))  
                {  
                    //return true;  
                    $_SESSION["email"] = $email;  
                    header("location:index.php");  
                }  
                else  
                {  
                    //return false;  
                    echo '<script>alert("Wrong User Details")</script>';  
                }  
            }else{  
                echo '<script>alert("Wrong User Details")</script>';  
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
    <title>Login Page</title>
</head>

<body>
    <div class="wrapper">
        <div class="container" id="form">
            <h2 class="login">Login Form</h2>
            <form action="login.php" method="post">
                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="email" required>
                    
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    
                    <button name="submit" type="submit">Login</button>
                    <label>
                        <input class="rem" type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>
                
                <div class="container" style="background-color:#f1f1f1">
                    <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
                    <span class="psw"><a href="#">Forgot password?</a></span>
                </div>
            </form>
        </div>
    </div>
</body>

</html>