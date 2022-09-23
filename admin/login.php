<?php
if(isset($_POST["submit"])){
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		//DB Connection
		$conn = new mysqli('localhost', 'kastrivi_kastrivi', 'rootadmin@2019') or die(mysqli_error());
		//Select DB From database
		$db = mysqli_select_db($conn, 'kastrivi_kastriviquiz') or die("database error");
		//Selecting database
		$query = mysqli_query($conn, "SELECT * FROM admin_user WHERE username='".$username."' AND password='".$password."'");
		$numrows = mysqli_num_rows($query);
		if($numrows != 0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbusername=$row['username'];
				$dbpassword=$row['password'];
				
			}
			if($username == $dbusername && $password == $dbpassword)
			{
				session_start();
				$_SESSION['username']=$username;

				//Redirect Browser
				header("Location:welcome.php");
			}
		}
		else
		{
			echo "Invalid Username or Password!";
		}
	}
	else
	{
		echo "Required All fields!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>KASTrivia - Administrator</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/rtl.css">
<link rel="stylesheet" type="text/css" href="../css/auth.css">

<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Karla:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<!-- Start content section -->
<div class="content-main"> 
  <div class="nav" id="myTopnav">    
    <a href="../index.php">Kastrivia</a>
    <a href="#"></a>
    <a href="#"></a>
    <a href="#"></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
  </div>

<div class="modal">
<div class="authup-content">  
<div class="auth-top"><input class="MyButton-left" type="button" value="Sign up" onclick="window.location.href='index.php'"/><input class="MyButton-right" type="button" value="Login" onclick="window.location.href='#'"/></div>
<div class="auth-top-up">Admin Login!</div>

<div class="authup-form-control">

  <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method='post' class="authup-form">

    
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">    
    <input type="submit" name="submit" value="Proceed">
  </form>
<!--    
    <div class="social-authup">
      <div class="social-gm">
        <div class="social-gm-one"></div>
        <div class="social-gm-two"><a href="login.php">Sign-in with google</a></div>        
      </div>
      <div class="social-fb">
        <div class="social-fb-one"></div>
        <div class="social-fb-two">Sign-in with facebook</div>        
      </div>      

    </div>
-->
    <div class="auth-top-bottom">FAQ</div>
    <div class="auth-bottom"><i class="fa fa-facebook-square" aria-hidden="true"></i><i class="fa fa-twitter-square" aria-hidden="true"></i><i class="fa fa-google-plus-square" aria-hidden="true"></i></div>

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
