<?php
    include("connection/config.php");

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $myusername = $_POST['Uname'];

        $mypassword = md5($_POST['Pass']);

        $sql = "SELECT id, username FROM admin WHERE Username = '$myusername' and Password = '$mypassword'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $count = mysqli_num_rows($result);

        if($count == 1) {
            $username = $row['username'];
            $_SESSION['username'] = $username;

            header("location: admin/adminDashboard.php");
        }else {

            $err = "* Your Admin Login Name or Password is invalid";

        }
    }
?>

<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/dynamic.css">   
</head>    
<body>
    <div class="homePage">
        <a href="index.php">
            <button>Go to home page</button>
        </a>
    </div>

    <h1>Login Page</h1><br>

    <div class="err">
    <?php 
    
    error_reporting(E_ERROR | E_PARSE);     

    echo $err; 
    
    ?>

    </div>

    <div class="login">    
        <form action="" name="regForm" method="POST" onsubmit="return formValidation()">    
            
            <label><b>Username</b></label>    
            <input type="text" name="Uname" id="Uname" placeholder="Username">
            <br> 
            <span style="color:#ff9966; font: size 14px; font-weight:bold;" id="rUsernameErr"></span>   
            <br><br>    
            <label><b>Password</b></label>    
            <input type="Password" name="Pass" id="Pass" placeholder="Password">
            <br>
            <span style="color:#ff9966; font: size 14px; font-weight:bold;" id="rPasswordErr"></span>    
            <br><br>
            <button type="submit" class="submit" id="submit" name="submit">Log In Here</button>
        </form> 
    </div>

    <script src="js/loginValidation.js"></script>

</body>

</html>     