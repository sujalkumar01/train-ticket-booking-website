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
            
            <p class="login-text">ABOUT US</p>
            <p class="about-us">Welcome to Train Status Checker, a web application meticulously crafted by Sujal Kumar, Sanskar Lodha, and Hardik Khanna, as part of their journey in the realm of web programming. Under the expert guidance of Bharathi Narayan, this project emerged from the crucible of the Web Programming Lab, as a testament to their dedication and passion for technology. At Train Status Checker, our mission is simple: to provide a seamless and efficient platform for checking the status of trains, ensuring that passengers stay informed and empowered throughout their journey. Whether you're a daily commuter, a traveler exploring new horizons, or simply someone awaiting the arrival of a loved one, we strive to make your experience smooth and stress-free. Sujal, Sanskar, and Hardik bring a diverse set of skills and perspectives to the table, each contributing their unique talents to every line of code and pixel on the screen. Their collaboration reflects not only their technical prowess but also their commitment to excellence and innovation. Bharathi Narayan, their mentor and guide, has been a beacon of wisdom and support throughout this project. With her expertise and encouragement, they have navigated the intricacies of web development, overcoming challenges and pushing boundaries to deliver a product they are proud of. As they embark on their journey beyond the confines of the lab, Sujal, Sanskar, and Hardik carry with them not just lines of code, but lessons learned, friendships forged, and memories cherished. Train Status Checker is more than just a project; it's a testament to their growth, resilience, and unwavering determination to make a difference in the world of technology. Thank you for choosing Train Status Checker. Sit back, relax, and let us handle the rest</p>
            
           
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