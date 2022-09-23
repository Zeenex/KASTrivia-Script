<?php
$email_pass = $_GET['email'];

if(isset($_POST["submit"])){
	if(!empty($_POST['password']) && !empty($_POST['email'])){
	    
		$changepass = $_POST['password'];
		$changeemail = $_POST['email'];
		//DB Connection
		$mysqli = new mysqli('localhost', 'kastrivi_kastrivi', 'rootadmin@2019') or die(mysqli_error());
		//Select DB From database
		$db = mysqli_select_db($mysqli, 'kastrivi_kastriviquiz') or die("database error");
		
		echo $email_pass;
		
		$result = mysqli_query($mysqli, "UPDATE google_users SET password='$changepass' WHERE email='$changeemail'");
		
		if(isset($result)){
		    
		    echo "<script>";echo " alert('Your password has been reset.');window.location.href='http://kastrivia.com/signin.php';</script>";
		}else{
		    
		    echo "<script>";echo " alert('Your password was not reset.');window.location.href='http://kastrivia.com/signin.php';</script>";
		}
		
	}
	
	
}
?>

<!DOCTYPE html>
<html>
<head>
<title>KASTrivia</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/rtl.css">
<link rel="stylesheet" type="text/css" href="css/auth.css">

<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Karla:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<!-- Start content section -->
<div class="content-main"> 
  <div class="nav" id="myTopnav">    
    <a href="index.php">Home</a>
    <a href="leaderboard.php">Leaderboard</a>
    <a href="faq.html">FAQ</a>
    <a href="signup.php"><button class="btn-default">Play</button></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
  </div>

<div class="modal">
<div class="authup-content">  
<div class="auth-top"></div>
<div class="auth-top-up">Reset Password</div>

<div class="authup-form-control">

  <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method='post' class="authup-form">
    <input type="email" name="email" placeholder="Enter your email">
    <input type="password" name="password" placeholder="Enter New Password">
     
    <input type="submit" name="submit" value="Reset">
  </form>
    
    

    <div class="auth-top-bottom"><a href="faq.html">FAQ</a></div>
    <div class="auth-bottom"><i class="fa fa-facebook-square" aria-hidden="true"></i><i class="fa fa-twitter-square" aria-hidden="true"></i><i class="fa fa-google-plus-square" aria-hidden="true"></i></div>

</div>

</div>

</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "nav") {
    x.className += " responsive";
  } else {
    x.className = "nav";
  }
}
</script>

</body>
</html> 
