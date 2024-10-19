<?php
    include 'config.php';
    session_start();
    
                    $traindetails=mysqli_query($connection,"SELECT * FROM `train` ");
                    if ($traindetails) 
                    {
                      $fromoption=array();
                      $tooption=array();
                      while($row=mysqli_fetch_assoc($traindetails))
                      {
                        $fromoption[]=$row["Departure_Station"];
                        $tooption[]=$row["Destination_Station"];
                      }
                     
                    }else
                    {
                      echo "error fetching option".mysqli_error($connection);
                    }
                    
                    
                      if(isset($_POST['book-button']))
                    {
                      if(isset($_SESSION['user_id']))
                      {
                        $departure=mysqli_real_escape_string($connection,$_POST['from-location']);
                        $destination=mysqli_real_escape_string($connection,$_POST['to-location']);
                        $tier=mysqli_real_escape_string($connection,$_POST['class-select']);
                        $date=mysqli_real_escape_string($connection,$_POST['date']);
                
                        $select=mysqli_query($connection,"SELECT * FROM `train` WHERE Departure_Station='$departure'") or die('query failed'.mysqli_error($connection));

                              $row2=mysqli_fetch_assoc($select);
                              $dep=$row2["Departure_Station"];
                              $train_id=$row2["Train_ID"];
                              $des=$row2["Destination_Station"];
                              $name=$_SESSION['user_id'];
                              $email=$_SESSION['email_id'];
                              $phone_number=$_SESSION['ph_no'];
                              $pnr=random_int(10000,50000);
                              $seat=random_int(1,20);
                              $class=$tier;
                          
                              if($des === $destination){

                                $insert=mysqli_query($connection,"INSERT INTO `passenger`(`Passenger_ID`, `Name`, `PNR`, `Seat_no`, `Train_ID`, `Email`, `Contact`, `class`) VALUES ('','$name','$pnr','$seat','$train_id','$email','$phone_number','$class')") or die('query failed'.mysqli_error($connection));
                                if ($insert) {
                                  $passenger_id = mysqli_insert_id($connection); // Get the auto-generated Passenger_ID
                              
                                  $insert2 = mysqli_query($connection, "INSERT INTO `ticket` (`Ticket_ID`, `Passenger_ID`, `Train_ID`, `Booking_Date`, `Fare`, `Status`, `PNR_Status`) VALUES ('','$passenger_id','$train_id','$date','500','booked','waiting')") or die('query failed'.mysqli_error($connection));
                                  header("Location:ticket.php");
                                  
                                exit();
                               }
                              }
                              else
                              {
                                echo 'no train';
                                $message[]='no train';
                                header("Location:ticket.php");
                                exit();
                              
                              }
                            
                
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
                      }else
                      {
                        header('Location:login.php');
                      }
                        
                    }    
                    
                    else
                    {
                      
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
    <title>train booking</title>
    <link rel="stylesheet" href="top.css">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="bottom.css">
    <link rel="stylesheet" href="locations.css">
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
        
    


    


    <div class="background-container">
      <div class="bg">

      </div>

      
      
      <div class="form-box">
        
          <div class="pnr-box">
            <a href="/train booking/pnr-status.php" id="pnr-button" >
              CHECK PNR STATUS HERE
            </a>
          </div>
          

          <div class="ticket">
            <p class="book-ticket">BOOK TICKET</p>
          </div>
          
          
          <form class="book-form" method="post" action="#" enctype="multipart/form-data">
            <div class="book">
            <div class="from-to">
              <!-- <input type="text" id="from-location" name="from-location" placeholder="From"> -->
                
                <div class="from-dropdown">
                  <input type="text" id="from-location" name="from-location" placeholder="From" required>
                  <ul class="dropdown-menu" id="dropdown-menu">
                  
                  </ul>
                </div>
                <div class="to-dropdown">
                  <input type="text" id="to-location" name="to-location" placeholder="To" required>
                  <ul class="dropdown-menu" id="dropdown-menu-to">
                  
                  </ul>
                </div>






              <!-- <input type="text" id="to-location" name="to-location" placeholder="To"> -->
            </div>
            <div>
              <input type="date" id="date" name="date" required>
            <select id="class" name="class-select" required>
              <option value="GENERAL">GENERAL</option>
              <option value="AC 1">AC 1</option>
              <option value="AC 2">AC 2</option>
              <option value="AC 3">AC 3</option>
            </select>                                                                                  
            </div>
            </div>
            
            <button type="submit" name="book-button" id="book-button">
              BOOK
            </button>


          </form>

        
        
      </div>
    </div>


     <div class="location-container">
      <div class="heading-container">
      <p class="heading">SUSTAINABLE HOLIDAYS</p>
      </div>


      <div class="locations">
        <div class="indore-box location-box"> 
          <img id="indore" src="/train booking/images/locations/Indore.jpg">
          <p class="indore-heading">
            INDORE
          </p>
          <P class="indore-text">
            Indore's sustainable ethos blends history with eco-innovation, boasting efficient waste management and green architecture. Its verdant landscapes and commitment to renewable energy showcase a harmonious balance of heritage and environmental consciousness, setting a shining example for modern cities.
          </P>
        </div>
        <div class="mysur-box location-box">
          <img id="mysur" src="/train booking/images/locations/mysuru.jpg">
          <p class="mysur-heading">
            MYSUR
          </p>
          <p class="mysur-text">
            Mysuru, a green gem, blends regal heritage with modern sustainability, boasting lush gardens, tree-lined avenues, and a commitment to eco-friendly practices. Its verdant landscapes and eco-initiatives, like waste management programs, reflect a harmonious blend of tradition and environmental consciousness.
          </p>
        </div>
        <div class="diu-box location-box">
          <img id="diu" src="/train booking/images/locations/diu.jpeg">
          <p class="diu-heading">
            DIU
          </p>
          <p class="diu-text">
            Diu's sustainable charm lies in its coastal serenity and eco-conscious initiatives, with solar power illuminating its streets and vibrant green spaces adorning its shores. Its fusion of Portuguese heritage and renewable energy epitomizes a modern coastal oasis committed to environmental stewardship.
          </p>
        </div>
      </div>
    </div>

     </div>
     <div class="bottom-booking">
      <a class="click-here" href="#">CLICK TO BOOK YOUR TICKET</a>
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

  
    <script src="intersection.js" ></script>
    <script src="time_update.js"></script>
    
    <script>
    // Assuming you've already fetched options from the backend and stored them in the $options array
    const fromoptions = <?php echo json_encode($fromoption); ?>;

    const inputField = document.getElementById('from-location');
    const dropdownMenu = document.getElementById('dropdown-menu');

    inputField.addEventListener('input', function() {
        const inputValue = inputField.value.toLowerCase();

        if (inputValue.length > 0) {
            dropdownMenu.style.display = 'block';
            filterDropdownOptions(inputValue);
        } else {
            dropdownMenu.style.display = 'none';
        }
    });

    function filterDropdownOptions(inputValue) {
        dropdownMenu.innerHTML = '';

        const filteredOptions = fromoptions.filter(fromoptions => fromoptions.toLowerCase().includes(inputValue));

        filteredOptions.forEach(fromoptions => {
            const li = document.createElement('li');
            li.textContent = fromoptions;
            dropdownMenu.appendChild(li);
        });
    }

    dropdownMenu.addEventListener('click', function(event) {
        if (event.target.tagName === 'LI') {
            inputField.value = event.target.textContent;
            dropdownMenu.style.display = 'none';
        }
    });
</script>

<script>
    // Assuming you've already fetched options from the backend and stored them in the $tooption array
    const toOptions = <?php echo json_encode($tooption); ?>;

    const inputTo = document.getElementById('to-location');
    const dropdownMenuTo = document.getElementById('dropdown-menu-to');

    inputTo.addEventListener('input', function() {
        const inputValue2 = inputTo.value.toLowerCase();

        if (inputValue2.length > 0) {
            dropdownMenuTo.style.display = 'block';
            filterDropdownOptions2(inputValue2);
        } else {
            dropdownMenuTo.style.display = 'none';
        }
    });

    function filterDropdownOptions2(inputValue2) {
        dropdownMenuTo.innerHTML = '';

        const filteredOptions2 = toOptions.filter(option => option.toLowerCase().includes(inputValue2));

        filteredOptions2.forEach(option => {
            const li = document.createElement('li');
            li.textContent = option;
            dropdownMenuTo.appendChild(li);
        });
    }

    dropdownMenuTo.addEventListener('click', function(event) {
        if (event.target.tagName === 'LI') {
            inputTo.value = event.target.textContent;
            dropdownMenuTo.style.display = 'none';
        }
    });
</script>


</body>
</html>