<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"></link>
	<title>Document</title>
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.0/dist/sweetalert2.all.min.js"></script>
	<script src="https://kit.fontawesome.com/14f5cf4f5a.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<button class=" btn-5 dodont" onclick="opendodont()"><span>Do's and Don'ts</span></button> 
    <div class="des">
        <div class="description">
			<p class="title">Unspam the spam</p>
			<p class="info">
			Phishing remains a huge threat to individuals and businesses.Phishing attacks use social engineering in 
			emails and messages to persuade people to hand over information such as passwords or financial information,
			or to get them to perform certain tasks such as downloading malware or completing a wire transfer.  That said, scammers still have success with this form of cyber attack and its use remains prevalent. 
			Plus, cybercriminals are changing tactics to get around the anti-phishing measures in place.So, it is always better to <strong>beAware!</strong>
			</p>
		</div>
		<div>
			<img class="imgdes" src="https://usa.kaspersky.com/content/en-us/images/repository/isc/2017-images/What-is-Cyber-Security.jpg"></img>
		</div>	
	</div> 
	<div class="urlform">
		<form action="index.php" method="post" class="inputurl">
			<div class="form-group">
				<input type="text" class="form-control" style="width:350px" name="urlinput"  placeholder="Enter URL" equired>
			</div>
			<input type = "submit" class="submit btn-5" value="Submit" name="urlsubmit">
		</form>
	</div>     
    <footer class="footer">
        <div class="logo-contact">
			<div class="logo">
               
			</div>
            <h2>About Us</h2>
            <p>Our goal is to detect phishing urls and save user from the resulting cyber threats</p>
                      
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
if(isset($_POST['urlsubmit'])) {
			
	$key = 'hMo3U22MV9rhXNA5sC8jBw7sNVakejMd';

	
	$URL = $_POST['urlinput'];
	$strictness = 0;
	
	$parameters = array(
		'strictness' => $strictness
	);


	$formatted_parameters = http_build_query($parameters);

	$url = sprintf(
		'https://www.ipqualityscore.com/api/json/url/%s/%s?%s',
		$key,
		urlencode($URL),
		$formatted_parameters
	);

	$timeout = 5;

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);

	$json = curl_exec($curl);
	curl_close($curl);

	$result = json_decode($json, true);
	$myJSON = json_encode($result);

	if(isset($result['success']) && $result['success'] === true){


		if($result['suspicious'] === true){
			echo '<script>
			Swal.fire({
			icon: "error",
			title: "Oops :(",
			text: "Suspicious ",
		})
		</script>';
		}
		
		if($result['phishing'] === true || $result['malware'] === true || $result['risk_score'] > 85){
			echo '<script>
			Swal.fire({
			icon: "error",
			title: "Oops :(",
			text: "Phishing ",
		})
		</script>';
		}
		if($result['phishing']== false){
			echo '<script>
			Swal.fire({
			icon: "success",
			title: "This is a safe url",
		})
		</script>';
		}
		

	} 
}else if(isset($_POST['subscribebtn']))
{
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
				title: "You will receive the latest news related to cyber threat",
			})
			</script>';
		}
	}
}



?>