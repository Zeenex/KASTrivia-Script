<?php

require_once './config.php';
if (!isset($_SESSION["user_id"]) && $_SESSION["email"] == "") {
  // user already logged in the site
  header("location:" . SITE_URL);
}

include_once("connection.php");
$sess_name = $_SESSION["name"];
$sess_email = $_SESSION["email"];


if(isset($_POST["submit"])){
    
    if(!empty($_POST['ref_id'])){
        
        $ref_id = $_POST['ref_id'];
        
        $ref = mysqli_query($mysqli, "SELECT share,refer FROM google_users WHERE name='$sess_name'");
        while($row=mysqli_fetch_array($ref)){
    
        $share = $row['share'];
        $refer = $row['refer'];
        
        }
        
       if($ref_id == $share){
            
            echo "<script>";echo " alert('This Reference ID is linked to your account.');window.location.href='http://kastrivia.com/userprofile.php';</script>";
            
        } 
        elseif($refer === '0' ){
     
             mysqli_query($mysqli, "UPDATE google_users SET lives=lives + 1, refer=refer + 1 WHERE name='$sess_name'");
             
             mysqli_query($mysqli, "UPDATE google_users SET lives=lives + 1 WHERE share='$ref_id'");
             
             echo "<script>";echo " alert('You have been credited with xtra life');window.location.href='http://kastrivia.com/userprofile.php';</script>";
 
         }else{
             
            echo "<script>";echo " alert('you have already been refered.');window.location.href='http://kastrivia.com/userprofile.php';</script>";
             
         }
        
 
        
        
        
    }else{
    ?>
    <!--Javascript Alert -->
        <script>alert('Please insert invite code');</script>
        <?php
  }
    
}



?>