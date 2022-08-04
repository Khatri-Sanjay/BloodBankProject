<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/dynamic.css">
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script> 
</head>

<body>

<!-- Heder part start -->
  <nav class="header">
       <div class="logo">
           <img src="./image/logo.png" alt="this">
           <h1>BloodBank</h1>
       </div>
      
          <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="donorForm.php">Donate</a></li>
            <li><a href="requestForm.php">Request</a></li>
            <!-- <li><a href="#contact">Contact</a></li> -->
            <li><a href="donorHistory.php">Donor History</a></li>
          </ul>

        <div class="login-buttons">
          <a href = "login.php" class="login">Admin Login</a>            
        </div>
   </nav> 
<!-- Header part end -->
