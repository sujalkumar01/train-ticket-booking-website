<?php

use function PHPSTORM_META\map;

    include 'config.php';
    
    
    if(isset($_POST['login']))
    {
        $email=mysqli_real_escape_string($connection,$_POST['email']);
        $password=mysqli_real_escape_string($connection,$_POST['password']);

        $select=mysqli_query($connection,"SELECT * FROM `user` WHERE email='$email' AND password='$password'") or die('query failed');

        if(mysqli_num_rows($select)==1)
        {
          session_start();
          $row=mysqli_fetch_assoc($select);
          $_SESSION['user_id']=$row['username'];
          $_SESSION['email_id']=$row['email'];
          $_SESSION['ph_no']=$row['Phone_Number'];
          header('Location:index.php');
          exit();
        }
        else
        {
          $message[]='incorrect email or password';
        }
    }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="top.css">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="bottom.css">
    <link rel="stylesheet" href="locations.css">
    <link rel="stylesheet" href="login.css">

</head>
<body>
  
<div class="header">
    <div class="header-div">
      <div class="header-logo">
          <img class="logo" src="/train booking/images/logo.png" >
      </div>
      
      <div class="header-options">
      <a class="home"href="index.php">home</a>
        <a class="login"href="login.php">login</a>

        <a class="register"href="register.php">register</a>
        <a class="contact-us"href="contactus.html">contact us</a>
          <a class="trains"href="option.php">cancel</a>
          <strong><time id="time">00:00:00</time> </strong>
          

      </div>
      
      <div class="profile">
          <button type="button" id="profile-button" onclick="window.location.href='profile.php'">
              <img class="profile-image"src="/train booking/images/user.png">
          </button>
      </div>     
    </div>   
  </div> 


  <div class="login-box-container">
    <div class="login-container">
        <div class="login-box">
            <img class="train-png" src="/train booking/images/trainpng.png">
            <img class="train-png2" src="/train booking/images/trainpng.png">
            <p class="login-text">LOGIN</p>
            
            <form class="email-pass"  method="post" action="#">
            <?php
                if(isset($message)){
                    foreach($message as $already){
                        echo '<div class="message">'.$already.'</div>';
                    }
                    
                }
                
                
                ?>
                <input type="text" id="email" name="email" placeholder="email id">
                <input type="password" id="password" name="password" placeholder="password">

            
            <button type="submit" name="login" id="login-button">
                LOGIN
            </button>
          </form>
        </div>

    </div>


  </div>









  <div class="footer-container">
    <div class=footer-links>
      <a id="about-us" href="aboutus.php">About us</a>
      <a id="features" href="index.php">Home</a>
      <!-- <a id="sdgs" href="#">SDG's</a> -->
      <a id="contact-us" href="contactus.html">Contact us</a>
      
    </div>
    <div class="copyright-credit">
      <p>&copy;2024 sujal,sanskar,hardik /mentor: bharthi maam</p>

    </div>
  

  </div>
  <script src="time_update.js"></script>
</body>
</html>      