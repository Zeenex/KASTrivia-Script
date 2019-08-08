
<?php

if(isset($_POST["submit"])){
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//DB Connection
		$conn = new mysqli('localhost', 'kastrivi_kastrivi', 'rootadmin@2019') or die(mysqli_error());
		//Select DB From database
		$db = mysqli_select_db($conn, 'kastrivi_kastriviquiz') or die("databse error");
		//Selecting database
		
		$sql_u = "SELECT * FROM google_users WHERE username='$username'";
  	    $res_u = mysqli_query($conn, $sql_u);
		
		if (mysqli_num_rows($res_u) > 0) {
  	  echo "<script>";echo " alert('Sorry... username already taken');</script>";
  	}else{
  	    
  	    //Insert to Mysqli Query
			$sql = "INSERT INTO admin_user(username,password) VALUES('$username','$password')";
			$result = mysqli_query($conn, $sql);
			//Result Message
			if($result){
			    
			echo "<script>";echo " alert('Your admin account has been created.');window.location.href='index.php';</script>";
			}
			else
			{
				header("Location: http://kastrivia.com/admin/index.php");
			}
  	    
  	    
  	    
  	    
  	    
  	}
		}
	else
	{
		?>
		<!--Javascript Alert -->
        <script>alert('Required all felds');</script>
        <?php
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>


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
<div class="auth-top"><input class="MyButton-left" type="button" value="Sign up" onclick="window.location.href='#'"/><input class="MyButton-right" type="button" value="Login" onclick="window.location.href='login.php'"/></div>
<div class="auth-top-up">Administrator</div>

<div class="authup-form-control">

  <form  action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method='post' class="authup-form">

    
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input id="myBtn" type="submit" name="submit" value="Admin SignUp">
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
<div class="auth-top-bottom">FAQ</div>

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
