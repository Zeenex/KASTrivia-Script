<?php

require_once('../config.php');
include "database.php"; 
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["email"])) {
  // user already logged in the site
  header("location:" . SITE_URL);
}

$sess_name = $_SESSION["name"];
$sess_email = $_SESSION["email"];

include "database.php"; 

$qs = mysqli_query($mysqli, "SELECT * FROM google_users WHERE email='$sess_email'");
    while($row=mysqli_fetch_array($qs)){
    $final_name=$row['name'];
    $amt_paid=$row['paidamount'];
    $claim = $row['claim'];
}

$ls = mysqli_query($mysqli, "SELECT * FROM leaderboard WHERE email='$sess_email'");
    while($row=mysqli_fetch_array($ls)){
    $final_score=$row['score'];
}




?>
<!DOCTYPE html>
<html>
<head>
<title>KASTrivia</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/rtl.css">
<link rel="stylesheet" type="text/css" href="../css/auth.css">
<link rel="stylesheet" type="text/css" href="../css/quiz.css">

<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Karla:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<!-- Start content section -->
<div class="content-main"> 
  <div class="nav" id="myTopnav">    
    <a href="http://kastrivia.com">Home</a>
    <a href="http://kastrivia.com/leaderboard.php">Leaderboard</a>
    <a href="http://kastrivia.com/faq.html">FAQ</a>
    <a href="http://kastrivia.com/signup.php"><button class="btn-default">Play</button></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
  </div>



<div class="modal">
<div class="authup-content">
    
<div class="final-cont">

<div class="final-top"></div>

<div class="final-mid"><p>You Scored</p><p><?php echo $final_score; ?></p></div>
<div class="final-bottom-cont">
<div class="final-bottom-u"> 
<?php

$qsc = mysqli_query($mysqli,"SELECT MIN(claim) AS minimum FROM google_users");
$row = mysqli_fetch_assoc($qsc); 

$minimum = $row['minimum'];



$up = $claim > $minimum; 
$down = $claim <= $minimum; 
if($up) {
 echo'<div class="left"> '.$final_name.'</div>
<div class="mid"><button>&#8358; '.$claim.' </button></div>
<div class="right"><i class="fa fa-long-arrow-up" style="color: green" aria-hidden="true"></i></div>

';
}

if($down) {

  echo'<div class="left"> '.$final_name.'</div>
<div class="mid"><button>&#8358; '.$claim.' </button></div>
<div class="right"><i class="fa fa-long-arrow-down" style="color: red" aria-hidden="true"></i></div>

';
}

?>


</div>
</div>
<?php
if($up) {
 echo'<div class="final-bottom"><p>You moved up on the leaderboard</p></div>';
 
}
if($down) {

  echo'<div class="final-bottom"><p>You moved down on the leaderboard</p></div>';
}


?>

<div class="final-bottom"><form action="../checklive.php" method="POST" enctype="multipart/form-data"><input type="submit" value="Play"></form><button onclick="window.location.href='../userprofile.php'">Exit</button></div>

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
