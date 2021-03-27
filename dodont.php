<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="editorial.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
  <div class="wrapper">
    <button onclick="goback()" class="btnback"><i class="fas fa-angle-double-left fa-3x"></i></button>
    <h1 style="font-size: 3rem; color: whitesmoke; text-align:center; padding-bottom: 4%;"> DO'S AND DONT'S</h1>
    <div class="center-line">
      <a href="#" class="scroll-icon"><i class="fas fa-caret-up"></i></a>
    </div>
    <div class="row row-2">
      <section>
        <i class="icon fa fa-user-secret"></i>
        <div class="details">
          <p><h3 style="padding-bottom: 5px; color:rgb(16, 16, 54)">Safe internet shopping</h3> <strong>DO</strong> check if the website's url starts from <i>https</i>. ALso look for padlock icon, which indicates that the connection is secure. <br><strong>DON'T</strong> save your credit/debit card information on websites and web browsers.</p>
        </div>
      </section>
    </div>
    <div class="row row-1">
      <section>
        <i class="icon fa fa-user-secret"></i>
        <div class="details">
          <p>
          <h3 style="color:rgb(16, 16, 54); padding-bottom: 5px;">Never give out personal information</h3>
          <strong>DON'T</strong> send passwords or any sensitive information over email, SMS or call. <br>No legitimate
          business will ask such information through informal means.NEVER respond to such mails or SMS. <br>Instead,
          directly contact to the concerned organisation. </p>
        </div>
      </section>
    </div>
    <div class="row row-2">
      <section>
        <i class="icon fa fa-user-secret"></i>
        <div class="details">
          <p>
          <h3 style="padding-bottom: 5px; color:rgb(16, 16, 54)">Verify a website's security</h3> <strong>DON'T</strong>
          click on any random urls recieved on social media. Neither download anything from unknown sites. <br>
          <strong>DO</strong> check for site's security certificate. <i>You can always visit our website to verify if
            the url is valid or not.</i></p>
        </div>
      </section>
    </div>
    <div class="row row-1">
      <section>
        <i class="icon fa fa-user-secret"></i>
        <div class="details">
          <p>
          <h3 style="padding-bottom: 5px; color:rgb(16, 16, 54)">Anti-Phishing Toolbar</h3> <strong>DO</strong> add
          another layer of protection against phishing scams by installing an anti-phishing tolbar to your browser.</p>
        </div>
      </section>
    </div>
    <div class="row row-2">
      <section>
        <i class="icon fa fa-user-secret"></i>
        <div class="details">
          <p>
          <h3 style="padding-bottom: 5px; color:rgb(16, 16, 54);">Be Wary of pop-ups</h3> <strong>DON'T</strong> click
          on pop-ups that appear while browsing. Sometimes even clicking on cancel button redirects to some phishing
          site. <br><strong>DO</strong> click on the small 'x' in the upper corner or block pop-ups in your browser.
          </p>
        </div>
      </section>
    </div>
    <div class="row row-1">
      <section>
        <i class="icon fa fa-user-secret"></i>
        <div class="details">
          <p>
          <h3 style="color:rgb(16, 16, 54) ;padding-bottom: 5px;">Think before you click!</h3><strong>DON'T</strong>
          reply to, click on links, or open attachments in SPAM or suspicious email or messages. <br>Send SPAM straight
          to the trash or report it. <br><strong>DO</strong> install antivirus and firewall programs in your systems.
          </p>
        </div>
      </section>
    </div>
  </div>
  <footer class="footer">
    <div class="logo-contact">
    <div class="logo">
            
    </div>
          <h2>About Us</h2>
          <p>Our goal is to detect phishing urls and save user from the rresulting cyber threats</p>
                  
    </div>        
    <div class="informations">
       <h3>Contact Us</h3>
        <p><i class="fas fa-mobile-alt"></i> +91 9833586709</p>
        <p><i class="fas fa-paper-plane"></i>info@afw.ac.in</p>   
    </div>        
    <div class="helpful-links">
        
    </div>        
    <div class="subscribe-form">
        <h3>Subscribe for latest Info</h3>
         <form action="index.php" method="post"> 
             <div class="input-container">
                 <i class="fas fa-user"></i>             
                 <input type="text" placeholder="Your Name" name="name" required>
             </div>                   
              
              <div class="input-container">
                 <i class="fas fa-envelope"></i>            
                 <input type="email" placeholder="Your Email" name="email" required>
              </div>                   
              <input type="submit" class="btn" value="Subscribe" name = "subscribebtn">              
         </form>             
    </div>            
    </footer>    
    <div class="footer-bottom">
        <div class="social-icons">
                <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>                
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>                
        </div>         
        
    </div>

<script src="urldetect.js"></script>
</body>
</html>
<?php

if(isset($_POST['subscribebtn'])){
  include 'conn.php';
  $name = $_POST['name'];
  $email = $_POST['email'];
  if(!$conn){
  echo "connected";
  die("Sorry we failed to connect: ". mysqli_connect_error());
  }else{ 
    $sql = "INSERT INTO `user`(`name`, `email`) VALUES ('$name','$email')";
    $result1 = $conn->query($sql);
    if($result1){
      echo '<script>
        Swal.fire({
        icon: "success",
        title: "You will receive the latest news related tocyber threat",
      })
      </script>';
    }
  }
}



?>

