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

<?php

function unique_code($limit)
{
  return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}
$share = unique_code(8);

if(isset($_POST["submit"])){
	if(!empty($_POST['chk_box']) && !empty($_POST['acct_name']) && !empty($_POST['acct_email']) && !empty($_POST['acct_mobile']) && !empty($_POST['acct_username'])){
		
		$name = $_POST['acct_name'];
		$email = $_POST['acct_email'];
		$mobile = $_POST['acct_mobile'];
		$username = $_POST['acct_username'];
		$password = mt_rand();
		
		//DB Connection
		$conn = new mysqli('localhost', 'kastrivi_kastrivi', 'rootadmin@2019') or die(mysqli_error());
		//Select DB From database
		$db = mysqli_select_db($conn, 'kastrivi_kastriviquiz') or die("databse error");
		//Selecting database
		
		$sql_u = "SELECT * FROM google_users WHERE username='$username'";
  	    $sql_e = "SELECT * FROM google_users WHERE email='$email'";
  	    $res_u = mysqli_query($conn, $sql_u);
  	    $res_e = mysqli_query($conn, $sql_e);
		
		if (mysqli_num_rows($res_u) > 0) {
  	  echo "<script>";echo " alert('Sorry... username already taken');</script>";
  	}else if(mysqli_num_rows($res_e) > 0){
  	  echo "<script>";echo " alert('Sorry... email already taken');</script>";
  	}else{
  	    
  	    //Insert to Mysqli Query
			$sql = "INSERT INTO google_users(name,email,mobile,username,password,share) VALUES('$name','$email','$mobile','$username','$password','$share')";
			$result = mysqli_query($conn, $sql);
			//Result Message
			if($result){
			    
require_once "Mail.php"; // PEAR Mail package
require_once ('Mail/mime.php'); // PEAR Mail_Mime packge

if ($_POST['submit']){

 $from = "no-reply@kastrivia.com"; //enter your email address
 $to = $email; //enter the email address of the contact your sending to
 $subject = "KASTrivia Nigeria"; // subject of your email

$headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);

$text = ''; // text versions of email.
$html = "

<html><body>
<div style='text-align: center; margin: 20px auto; background-color: #F4E2E2; line-height: 40px; width: 70%;'>
<p style='font-size: 24px; font-family: Raleway; font-weight: bold;'>Welcome $name to KASTrivia. </p>

<p style='font-size: 16px; font-family: Raleway;'>A Nigeria's leading fun platform.</p>

<p style='font-size: 16px; font-family: Raleway;'>Compete with fans in an online quiz and win prizes.</p>

<p style='font-size: 16px; font-family: Raleway; text-decoration: underline;'>See below details</p>

<p style='font-size: 16px; font-family: Raleway;'> Username: $username</p>
<p style='font-size: 16px; font-family: Raleway;'> Default Password: $password</p>


<p style=' font-size: 16px; font-family: Raleway;'>Thank you for signing up. Please click <a href='https://www.kastrivia.com/changepass.php?email=$email'>Here</a> to activate your account</p>

<p style='font-size: 16px; font-family: Raleway;'>Best Wishes</p>

<p style='font-family: Brush Script MT,cursive; font-size: 20px'>KASTrivia Team</p>

</div>
</body></html>

"; // html versions of email.

$crlf = "\n";

$mime = new Mail_mime($crlf);
$mime->setTXTBody($text);
$mime->setHTMLBody($html);

//do not ever try to call these lines in reverse order
$body = $mime->get();
$headers = $mime->headers($headers);

 $host = "localhost"; // all scripts must use localhost
 $username = "no-reply@kastrivia.com"; //  your email address (same as webmail username)
 $password = "rootadmin@2019"; // your password (same as webmail password)

$smtp = Mail::factory('smtp', array ('host' => $host, 'auth' => true,
'username' => $username,'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
}
else {
echo "<script>";echo " alert('A mail has been sent to you to the email provided for confirmation.');window.location.href='signup.php';</script>";
}
  }
				
			}
			else
			{
				header("Location: http://kastrivia.com/signup.php");
			}
  	    
  	    
  	    
  	    
  	    
  	}
		}
	else
	{
		?>
		<!--Javascript Alert -->
        <script>alert('Required all felds and Please check the box');</script>
        <?php
	}
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
 $("#phone").keydown(function(event) {
  k = event.which;
  if ((k >= 96 && k <= 105) || k == 8) {
    if ($(this).val().length == 11) {
      if (k == 8) {
        return true;
      } else {
        event.preventDefault();
        return false;

      }
    }
  } else {
    event.preventDefault();
    return false;
  }

});
</script>
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
<div class="auth-top"><input class="MyButton-left" type="button" value="Sign up" style="color: #f9204f" onclick="window.location.href='#'"/><input class="MyButton-right" type="button" style="color: #a8a8a8" value="Login" onclick="window.location.href='signin.php'"/></div>
<div class="auth-top-up">Let's know you</div>

<div class="authup-form-control">

  <form  action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method='post' class="authup-form">

    <input type="text" name="acct_name" placeholder="Full name">
    <input type="email" name="acct_email" placeholder="Email Address">
    <input type="text" name="acct_mobile" onkeypress="return event.target.value.length < 11" required placeholder="Mobile Number">
    <input type="text" name="acct_username" placeholder="Nickname">
    <label><input type="radio" name="chk_box">By clicking this box you agree to our terms & conditions</label>
    <input id="myBtn" type="submit" name="submit" value="SignUp">
  </form>


<!--
    <div class="social-authup">
      <div class="social-gm">
        <div class="social-gm-one"></div>
        <div class="social-gm-two"><a href="login.php">Sign-up with google</a></div>        
      </div>
      <div class="social-fb">
        <div class="social-fb-one"></div>
        <div class="social-fb-two">Sign-up with facebook</div>        
      </div>    

    </div>
-->
<div class="auth-top-bottom"><a href="faq.html">FAQ</a></div>

<div class="auth-bottom"><i class="fa fa-facebook-square" aria-hidden="true"></i><i class="fa fa-twitter-square" aria-hidden="true"></i><i class="fa fa-google-plus-square" aria-hidden="true"></i></div>
</div>



</div>

</div>


<script type="text/javascript">
  $("#password").password('toggle');
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
