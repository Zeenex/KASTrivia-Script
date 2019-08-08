<?php

require_once './config.php';
if (!isset($_SESSION["username"]) || !isset($_SESSION["email"])) {
  // user already logged in the site
  header("location:" . SITE_URL);
}

include_once("connection.php");
$sess_name = $_SESSION["name"];
$sess_email = $_SESSION["email"];
    
$userlive = mysqli_query($mysqli, "SELECT lives FROM google_users WHERE email='$sess_email'");
while($row=mysqli_fetch_array($userlive)){
    
    $play_lives = $row['lives'];
}

if($play_lives <= '0'){
    
    echo "<script>";echo " alert('You have run out of lives please purchase more life to continue playing.');window.location.href='userprofile.php';</script>";
    
    
}else{
    
    header("Location: category.php");
}




?>