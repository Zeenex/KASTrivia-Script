<?

require_once('../config.php');
if (!isset($_SESSION["user_id"]) && $_SESSION["email"] == "") {
  // user already logged in the site
  header("location:" . SITE_URL);
}
$sess_name = $_SESSION["name"];
$sess_email = $_SESSION["email"];

include_once("database.php");

$number = $_GET['n'];
$cat_name = $_GET['category_name'];


$query = mysqli_query($mysqli, "SELECT * FROM questions WHERE category_name='$cat_name' LIMIT 10");
$num_cat = mysqli_num_rows($query);

$que = mysqli_query($mysqli, "SELECT * FROM questions WHERE category_name='$cat_name' ORDER BY RAND() limit 1 ");
while($row=mysqli_fetch_array($que)){
$question = $row['question'];
$ques_num = $row['question_number'];
}

$num_ques = mysqli_query($mysqli, "SELECT * FROM choices WHERE question_number='$ques_num' ORDER BY RAND()");



$qsc = mysqli_query($mysqli, "SELECT * FROM google_users WHERE email='$sess_email'");
    while($row=mysqli_fetch_array($qsc)){
    $userPicture = $row['pic'];
$userPictureURL = '../uploads/'.$userPicture;
}


?>

<!DOCTYPE html>
<html>
<head>
<title>Trivia Special</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/rtl.css">
<link rel="stylesheet" type="text/css" href="../css/user.css">
<link rel="stylesheet" type="text/css" href="../css/quiz.css">

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
    <a href="http://kastrivia.com">Home</a>
    <a href="http://kastrivia.com/leaderboard.php">Leaderboard</a>
    <a href="http://kastrivia.com/faq.html">FAQ</a>
    <a href="http://tkastrivia.com/signup.php"><button class="btn-default">Play</button></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
  </div>

<div class="userrow">
    <div><span id="display" style="color:#000;font-size:15px;margin-top: 20px;"></span></div>
        <div><span id="submitted" style="color:red;font-size:15px;"></span></div>
<div class="userprof">
  
  <div class="userimg"><img src="<?php echo $userPictureURL; ?>" id="imagePreview"></div>
  
       <div class="quiz-number"><h2><?php echo $number; ?>/<?php echo $num_cat; ?></h2></div>
           
            </div>
           
     <div class="quiz-question"><h2><?php echo $question; ?></h2></div>
   <form method="post" action="process.php" name="mcQuestion" id="mcQuestion"> 
  <div class="quiz-choice">
        <?php
        while($row=mysqli_fetch_array($num_ques)){
                $choic = $row['choice'];
                        
                        echo '<input type="submit" style="cursor:pointer" name ="choice" value="'.$choic.'"/>';
                        
            }

?>
      <input type="hidden" name="number" value="<?php echo $number; ?>" />
      <input type="hidden" name="category" value="<?php echo $cat_name; ?>" />
      <input type="hidden" name="total_num" value="<?php echo $num_cat; ?>" />
      <input type="hidden" name="ques_num" value="<?php echo $ques_num; ?>" />
      
        
   </div>         

   </form>
   <div class="logout"><a class="btn btn-block btn-social btn-google-plus" href="../logout.php"><i class="fa fa-times" aria-hidden="true"></i></a></div>
</div>

</div>

<!-- end content section --> 



<div class="footer">
  <div class="faq-footer-bottom">    
    <div class="fbt-one">
      <p>CATEGORIES</p>      
        <li><a href="#">Football</a></li>
        <li><a href="#">Formula 1</a></li>
        <li><a href="#">Music</a></li>
        <li><a href="#">History</a></li>
        <li><a href="#">Science</a></li>  

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
        <li><a href="#">FAQ</a></li>
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
        var div = document.getElementById('display');
        var submitted = document.getElementById('submitted');

          function CountDown(duration, display) {

                    var timer = duration, minutes, seconds;

                  var interVal=  setInterval(function () {
                        minutes = parseInt(timer / 60, 10);
                        seconds = parseInt(timer % 60, 10);

                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;
                display.innerHTML ="<b>" + minutes + "m : " + seconds + "s" + "</b>";
                        if (timer > 0) {
                           --timer;
                        }else{
                   clearInterval(interVal)
                            SubmitFunction();
                         }

                   },1000);

            }

          function SubmitFunction(){

            
            submitted.innerHTML="Time is up!";
            document.getElementById('mcQuestion').submit();

           }
           CountDown(20,div);
        </script>


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
