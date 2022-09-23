<?php
/*
 * @author Puneet Mehta
 * @website: http://www.PHPHive.info
 * @facebook: https://www.facebook.com/pages/PHPHive/1548210492057258
 */
require_once './config.php';
if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
  // user already logged in the site
  header("location:".SITE_URL . "/userprofile.php");
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
<div class="auth-top"><input class="MyButton-left" style="color: #a8a8a8"  type="button" value="Sign up" onclick="window.location.href='signup.php'"/><input class="MyButton-right" type="button" style="color: #f9204f"  value="Login" onclick="window.location.href='#'"/></div>
<div class="auth-top-up">Welcome!</div>

<div class="authup-form-control">

  <form action='auth/login.php' method='post' class="authup-form">

    
    <input type="email" name="email" placeholder="Email Address">
    <input type="password" name="password" placeholder="Password">    
    <input type="submit" name="submit" value="Proceed">
  </form>
  
  <p style="font-size: 10px;">Forgot Pasword? Click <a href="passreset.php">here</a></p>
  
<!--    
    <div class="social-authup">
      <div class="social-gm">
        <div class="social-gm-one"></div>
        <div class="social-gm-two"><a href="login.php">Sign-in with google</a></div>        
      </div>
      <div class="social-fb">
        <div class="social-fb-one"></div>
        <div class="social-fb-two">Sign-in with facebook</div>        
      </div>      

    </div>
-->
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
