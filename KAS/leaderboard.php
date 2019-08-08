<?php

include "connection.php"; 

$qsc = mysqli_query($mysqli, "SELECT username, claim, pic FROM google_users WHERE claim = (SELECT MAX(claim) FROM google_users)");
    while($row=mysqli_fetch_array($qsc)){
    $claim_highest=$row['claim'];
    $claim_highest_username=$row['username'];
    $claim_highest_pic = $row['pic'];
    $userPictureURL_highest = 'uploads/'.$claim_highest_pic;
}


$qsc = mysqli_query($mysqli, "SELECT username, claim, pic FROM google_users WHERE claim = (SELECT MAX(claim) FROM google_users WHERE claim < (SELECT MAX(claim) FROM google_users))");
    while($row=mysqli_fetch_array($qsc)){
    $claim_second=$row['claim'];
    $claim_second_username=$row['username'];
    $claim_second_pic = $row['pic'];
    $userPictureURL_second = 'uploads/'.$claim_second_pic;
}

$qsc = mysqli_query($mysqli, "SELECT username, claim, pic FROM google_users WHERE claim = (SELECT MAX(claim) FROM google_users WHERE claim < (SELECT MAX(claim) FROM google_users WHERE claim < (SELECT MAX(claim) FROM google_users)))");
    while($row=mysqli_fetch_array($qsc)){
    $claim_third=$row['claim'];
    $claim_third_username=$row['username'];
    $claim_third_pic = $row['pic'];
    $userPictureURL_third = 'uploads/'.$claim_third_pic;
}




?>





<!DOCTYPE html>
<html>
<head>
<title>KASTrivia</title>
<meta username="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/rtl.css">
<link rel="stylesheet" type="text/css" href="css/user.css">
<link rel="stylesheet" type="text/css" href="css/leader.css">

<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Karla:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="js/faq.js"></script>

</head>
<body>

<!-- Start content section -->
<div class="profile-content"> 
  <div class="nav" id="myTopnav">    
    <a href="index.php">Home</a>
    <a href="leaderboard.php">Leaderboard</a>
    <a href="faq.html">FAQ</a>
    <a href="signup.php"><button class="btn-default">Play</button></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
  </div>



<div class="player-position">
    
    <div class="player-position-in">
  
  <div class="pos-title"><h2>Week</h2> <h2>1</h2></div>

  <div class="left-pos">
  <p><img src="img/2.png" /></p> 
    <div class="player2"><img src="<?php echo $userPictureURL_second; ?>" id="imagePreview-tw"></div>    
    <p><?php echo $claim_second_username; ?></p>
    <button>&#8358;<?php echo $claim_second; ?></button>
  </div>

  <div class="middle-pos"> 
  <p><img src="img/1.png" /></p>   
    <div class="player1"><img src="<?php echo $userPictureURL_highest; ?>" id="imagePreview"></div>
    <p><?php echo $claim_highest_username; ?> </p>
    <button>&#8358;<?php echo $claim_highest; ?></button>
  </div>


  <div class="right-pos">
  <p><img src="../img/3.png" /></p>   
    <div class="player3"><img src="<?php echo $userPictureURL_third ?>" id="imagePreview-tw"></div>
    <p><?php echo $claim_third_username; ?></p>
    <button>&#8358;<?php echo $claim_third; ?></button>
  </div>
</div>

</div>


<div class="leaderrow">
        <table>
     <tr class="tdrow">
    <td><b>Username</b></td>
    <td><b>Score</b></td>
    <td><b>Claim (&#8358;)</b></td>
    <td><b>Position</b></td>
  </tr>   
  <?php
  
  $qsc = mysqli_query($mysqli, "SELECT username,score, claim FROM google_users WHERE claim < (SELECT MAX(claim) FROM google_users WHERE claim < (SELECT MAX(claim) FROM google_users WHERE claim < (SELECT MAX(claim) FROM google_users WHERE claim <= (SELECT MAX(claim) FROM google_users))))");
    while($row=mysqli_fetch_array($qsc)){
        
    
echo '
 
  <tr class="tdrow">
    <td>'.$row['username'].'</td>
    <td>'.$row['score'].'</td>
    <td>'.$row['claim'].'</td>
    <td><i class="fa fa-long-arrow-down" aria-hidden="true"></i></td>
  </tr>

     
';}
?>

   </table>


</div>

</div>







<!-- end content section --> 



<div class="footer">  
 


  <div class="faq-footer-bottom">    
    <div class="fbt-one">
      <p>CATEGORIES</p>      
        <li><a href="category.php">Sports</a></li>
        <li><a href="category.php">Music</a></li>
        <li><a href="category.php">Movies</a></li>  

    </div>
    <div class="fbt-two">
      <p>INFORMATION</p>
        <li><a href="#">About us</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Job</a></li>
     
    </div>
    <div class="fbt-three">
      <p>Support</p>
      
        <li><a href="#">Contact us</a></li>
        <li><a href="#">Report a Problem</a></li>
        <li><a href="faq.html">FAQ</a></li>
        <li><a href="legal.html">Legal & Privacy</a></li>

    </div>
    <div class="fbt-four">
      <span><i class="fa fa-facebook-square" aria-hidden="true"></i></span>
      <span><i class="fa fa-instagram" aria-hidden="true"></i></span>
      <span><i class="fa fa-twitter-square" aria-hidden="true"></i></span>
      <span><i class="fa fa-google-plus-square" aria-hidden="true"></i></span>
      <br>
       
    </div>
    <p>Find us</p> 
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
