<?php include "connection.php"; 


require_once('./config.php');
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["name"])) {
  // user already logged in the site
  header("location:" . SITE_URL);
}

$sess_name = $_SESSION["name"];

?>


<!DOCTYPE html>
<html>
<head>
<title>KASTrivia</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/rtl.css">

<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Karla:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="js/faq.js"></script>

<style>
    
    .hidden {
    display:none;
}
    .hidden-mu {
    display:none;
}
    .hidden-mo {
    display:none;
}

</style>

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


<div class="faq-title"> <p>Categories</p></div>

<div class="faq-search">
  <form>
  <input type="text" name="search">
  </form>
</div>


<div class="cat-row">

<div class="cat-left">
  
  <div class="cat-menu">

  <button class="showButton show">Sports</button>
  <button class="hideButton hidden">Sports</button>
  
  
  <button class="showButton-mu show-mu">Music</button>
  <button class="hideButton-mu hidden-mu">Music</button>
  
  <button class="showButton-mo show-mo">Movies</button>
  <button class="hideButton-mo hidden-mo">Movies</button>


  </div>

</div>

<div class="cat-right">
  
  <div class="hidden">
    <a href="quiz/athletics.php" style="content:url('img/athletics.png')"></a>
    <a href="quiz/basketball.php" style="content:url('img/basketball.png')"></a>
    <a href="quiz/football.php" style="content:url('img/football.png')"></a>
  </div>
  
  <div class="hidden-mu">
    <a href="quiz/rnb.php" style="content:url('img/rnb.png')"></a>
    <a href="quiz/jazz.php" style="content:url('img/jazz.png')"></a>
    <a href="quiz/rock.php" style="content:url('img/rock.png')"></a>
    <a href="quiz/naija.php" style="content:url('img/naija.png')"></a>
  </div>

    <div class="hidden-mo">
    <a href="quiz/nollywood.php" style="content:url('img/nollywood.png')"></a>
    <a href="quiz/hollywood.php" style="content:url('img/hollywood.png')"></a>
  </div>


</div>

</div>

<div class="clear"></di>
<!-- end content section --> 



<div class="footer">  
 


  <div class="faq-footer-bottom">    
    <div class="fbt-one">
      <p>CATEGORIES</p>      
        <li><a href="#">Sports</a></li>
        <li><a href="#">Music</a></li>
        <li><a href="#">Movies</a></li>  

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
$(function () {

$('.showButton').click(function () {

$('.hidden').show();

$('.show').hide();
$('.show-mu').show();
$('.show-mo').show();
$('.hidden-mu').hide();
$('.hidden-mo').hide();
});

$('.hideButton').click(function () {

$('.hidden').hide();

$('.show').show();

});

});
</script>

<script>
$(function () {

$('.showButton-mu').click(function () {

$('.hidden-mu').show();

$('.show-mu').hide();
$('.show').show();
$('.hidden').hide();
$('.show-mo').show();
$('.hidden-mo').hide();
});

$('.hideButton-mu').click(function () {

$('.hidden-mu').hide();

$('.show-mu').show();

});

});
</script>

<script>
$(function () {

$('.showButton-mo').click(function () {

$('.hidden-mo').show();

$('.show-mu').show();
$('.show').show();
$('.hidden-mu').hide();
$('.hidden').hide();
$('.show-mo').hide();

});

$('.hideButton-mo').click(function () {

$('.hidden-mo').hide();

$('.show-mo').show();

});

});
</script>
</body>
</html> 
