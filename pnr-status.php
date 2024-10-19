<?php
include 'config.php';
session_start();
$status = ""; // Initialize status variable

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pnrcheck'])) {
    $pnrno = mysqli_real_escape_string($connection, $_POST['pnrcheck']);
    $ticket = mysqli_query($connection, "SELECT passenger.*, ticket.* FROM passenger JOIN ticket ON passenger.passenger_ID = ticket.passenger_ID where PNR= '$pnrno'");

    if (!$ticket) {
        // Query failed, output error message
        die('Query failed: ' . mysqli_error($connection));
    }

    // Fetch the row
    $row = mysqli_fetch_assoc($ticket);

    if ($row) {
        // Row fetched successfully, extract data
        $status = $row["PNR_Status"];
    } else {
       
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
    <title>contact us</title>
    <link rel="stylesheet" href="top.css">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="bottom.css">
    <link rel="stylesheet" href="locations.css">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="contactus.css">
    <link rel="stylesheet" href="pnr-status.css">
    

</head>
<body>
    <div class="header">
    <div class="header-div">
      <div class="header-logo">
          <img class="logo" src="/train booking/images/logo.png" >
      </div>
      
      <div class="header-options">
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
                <img class="pnr-train-png" src="/train booking/images/pnr_train-transformed.png">
                
                <p class="PNR-text">PNR STATUS</p>
                
                <?php
                if(isset($status))
                {
                    echo '<div class="message">'.$status .'</div>';  
                } 
                
                ?>
                <form class="email-pass"  action="pnr-status.php" method="post">
                    <input type="text" id="pnr-number" name="pnrcheck" placeholder="PNR NUMBER">
                  
    
                
                <button type="submit" id="submit-button">
                    CHECK 
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