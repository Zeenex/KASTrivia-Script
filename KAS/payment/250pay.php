<?php

include "database.php"; 


require_once('../config.php');
include "database.php"; 
if (!isset($_SESSION["username"]) || !isset($_SESSION["name"])) {
  // user already logged in the site
  header("location:" . SITE_URL);
} 
$sess_name = $_SESSION["name"];
$sess_email = $_SESSION["email"];

$result = mysqli_query($mysqli, "UPDATE google_users SET lives=lives + 12  WHERE name='$sess_name'");

if($result){
    
    echo "<script>";echo " alert('You have successfully purchased 6 lives for 12 games.');window.location.href='../userprofile.php';</script>";
}else{
    
    echo "<script>";echo " alert('Your Purchase was not successful');window.location.href='../userprofile.php';</script>";
}



?>