<?php include "database.php"; 


require_once('../config.php');
include "database.php"; 
if (!isset($_SESSION["username"]) || !isset($_SESSION["email"])) {
  // user already logged in the site
  header("location:" . SITE_URL);
}

$sess_name = $_SESSION["name"];
$user_name = $_SESSION["username"];
$sess_email = $_SESSION["email"];

$cat_name = 'hollywood';

//Get the total questions
	$query="select * from questions where category_name='$cat_name' Limit 10";
	//Get Results
	$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
	$total = $results->num_rows;
	

$CheckSQL = "SELECT * FROM leaderboard WHERE email='$sess_email'";
 
 $check = mysqli_fetch_array(mysqli_query($mysqli,$CheckSQL));
 
 if(isset($check)){

 mysqli_query($mysqli, "UPDATE leaderboard set 	category='$cat_name', score='0', wrong='0', total='0' WHERE email='$sess_email'");

 }else{
     
     	//create new user in leaderboard
	
mysqli_query($mysqli, "INSERT INTO leaderboard (name, username, category) VALUE('$sess_name','$user_name','$cat_name')");
 }	
	
mysqli_query($mysqli, "UPDATE google_users SET lives=lives - 1 WHERE email='$sess_email'");	
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
<div class="quizcat-content">
    


<div class="quizcat-top-hollywood"></div>

<div class="quizcat-mid">
    
    <p>Welcome to KAStrivia Nigeria's leading fun platform</p>

<p>Compete with football fans across Nigeria and take a step towards winning amazing cash prizes and gift items.</p>

<p>All you need to do is answer 10 questions correctly and climb up the rankings.</p>
<p style="text-align: left">Rules:</p>
<li>You are expected to finish each game</li>
<li>Get back in with extra life</li>
<li>Answer all questions right to get prize</li>




</div>
<div class="quizcat-bottom"><button onclick="window.location.href='question.php?n=1&category_name=<?php echo $cat_name; ?>'">Start Quiz</button></div>




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

