<?php

include "connection.php"; 

$qsc = mysqli_query($mysqli, "SELECT * FROM google_users WHERE claim = (SELECT MAX(claim) FROM google_users)");
    while($row=mysqli_fetch_array($qsc)){
    $claim_highest=$row['claim'];
    $claim_highest_name=$row['name'];
    $claim_highest_pic = $row['pic'];
    $userPictureURL_highest = 'uploads/'.$claim_highest_pic;
}


$qsc = mysqli_query($mysqli, "SELECT name, claim, pic FROM google_users WHERE claim = (SELECT MAX(claim) FROM google_users WHERE claim < (SELECT MAX(claim) FROM google_users))");
    while($row=mysqli_fetch_array($qsc)){
    $claim_second=$row['claim'];
    $claim_second_name=$row['name'];
    $claim_second_pic = $row['pic'];
    $userPictureURL_second = 'uploads/'.$claim_second_pic;
}

$qsc = mysqli_query($mysqli, "SELECT name, claim, pic FROM google_users WHERE claim = (SELECT MAX(claim) FROM google_users WHERE claim < (SELECT MAX(claim) FROM google_users WHERE claim < (SELECT MAX(claim) FROM google_users)))");
    while($row=mysqli_fetch_array($qsc)){
    $claim_third=$row['claim'];
    $claim_third_name=$row['name'];
    $claim_third_pic = $row['pic'];
    $userPictureURL_third = 'uploads/'.$claim_third_pic;
}




?>


<!DOCTYPE html>
<html>
<head>
<title>KASTrivia</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/rtl.css">
<link rel="stylesheet" type="text/css" href="css/user.css">
<link rel="stylesheet" type="text/css" href="css/responsiveslides.css">


<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Karla:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
    // You can also use "$(window).load(function() {"
    $(function () {

      // Slideshow 1
      $("#slider1").responsiveSlides({
        maxwidth: 1920,
        speed: 800
      });

    });
  </script>

</head>
<body>

<!-- Start content section -->
<div class="content-main"> 
 <div class="nav" id="myTopnav">    
    <a href="index.php">Home</a>
    <a href="https://kastrivia.com/leaderboard.php">Leaderboard</a>
    <a href="faq.html">FAQ</a>
    <a href="signup.php"><button class="btn-default">Play</button></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
  </div>

<div class="slideshow-container">
<ul class="rslides" id="slider1">
      <li><img src="slider_img/banner1.png"></li>
      <li><img src="slider_img/banner2.png"></li>
      <li><img src="slider_img/banner3.png"></li>
      <li><img src="slider_img/banner4.png"></li>
    </ul>

</div>
<br>



<div class="content-title"> <p>Get rewarded for your awesomeness</p></div>

<div class="triv-row">
  <div class="triv-column-one">

    <div class="triv-progress-one">1</div>
    <div class="triv-progress-bar"></div>
    <div class="triv-progress-two">2</div>
    <div class="triv-progress-bar"></div>
    <div class="triv-progress-three">3</div>

  </div>
  <div class="triv-column">
    
    <div class="triv-progress-sign"><h3>Start by signing up</h3>
    <p>Sign up so we can create a unique account for you to play</p>
    </div>
    <div class="triv-progress-circle"></div>
    <div class="triv-progress-sign"><h3>Play</h3>
    <p>Play in different categories of trivia quizzes and win exciting cash prices.</p>
    </div>
  </div>
  <div class="triv-column">
    
    <div class="triv-progress-circle-right" onclick="window.location.href='signup.php'"></div>    
    <div class="triv-progress-sign"><h3>Play</h3>
    <p>Play in different categories of trivia quizzes and win exciting cash prices.</p>
    </div>
    <div class="triv-progress-circle-down"></div>
  </div>
</div>


<div class="bottom-content">  
  <button onclick="window.location.href='signup.php'">Start now</button>
  <div class="progline"></div>
  <p>Win exciting prices</p>
</div>
</div>
<!-- end content section --> 


<!-- Start category section -->
<div class="category-section">
  
  <h2>Category</h2><br><br>

  <div class="cat1">
  <h5>Sports</h5>
  <h6>10 questions</h6>
  </div>
  <div class="cat2">
    <h5>Music</h5>
    <h6>10 questions</h6>
  </div>
  <div class="cat3">
    <h5>Movies</h5>
    <h6>10 questions</h6>
  </div>


</div>
<!-- end category section --> 

<!-- Start player section -->
<div class="player-position">
    
    <div class="player-position-in">
  
  <div class="pos-title"><h2>Week</h2> <h2>1</h2></div>


  <div class="left-pos">
  <p><img src="img/2.png" /></p> 
    <div class="player2"><img src="<?php echo $userPictureURL_second; ?>" id="imagePreview-tw"></div>    
    <p><?php echo $claim_second_name; ?></p>
    <button>&#8358;<?php echo $claim_second; ?></button>
  </div>

  <div class="middle-pos"> 
  <p><img src="img/1.png" /></p>   
    <div class="player1"><img src="<?php echo $userPictureURL_highest; ?>" id="imagePreview"></div>
    <p><?php echo $claim_highest_name; ?> </p>
    <button>&#8358;<?php echo $claim_highest; ?></button>
  </div>


  <div class="right-pos">
  <p><img src="../img/3.png" /></p>   
    <div class="player3"><img src="<?php echo $userPictureURL_third ?>" id="imagePreview-tw"></div>
    <p><?php echo $claim_third_name; ?></p>
    <button>&#8358;<?php echo $claim_third; ?></button>
  </div>
</div>

</div>
<!-- end player section --> 


<div class="footer">  
  <div class="top-left"> 
  <p>Live Trivia starts in:</p>  
  <div class="start-time">0days:0hrs:0min:0sec</div>   
  </div>
  <div class="top-right">     
    <div class="start-join"><i class="fa fa-arrow-circle-o-right" style="cursor: pointer;"onclick="window.location.href='signup.php'" aria-hidden="true"></i></div>
    <p>Join Now</p>    
  </div>

  <div class="footer-bottom">    
    <div class="fbt-one">
      <p>CATEGORIES</p>      
        <li><a href="category.php">Football</a></li>
        <li><a href="category.php">Music</a></li>
        <li><a href="category.php">Movies</a></li>  

    </div>
    <div class="fbt-two">
      <p>INFORMATION</p>
        <li><a href="about.html">About us</a></li>
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


<script type="text/javascript" src="js/responsiveslides.js"></script>
<script type="text/javascript" src="js/responsiveslides.min.js"></script>

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
