<?php

if(isset($_POST["submit"])){
	if(!empty($_POST['acct_name']) && !empty($_POST['acct_email']) && !empty($_POST['acct_mobile']) && !empty($_POST['acct_username']) && !empty($_POST['acct_password'])){
		
		$name = $_POST['acct_name'];
		$email = $_POST['acct_email'];
		$mobile = $_POST['acct_mobile'];
		$username = $_POST['acct_username'];
		$password = $_POST['acct_password'];
		
		
		//DB Connection
		$conn = new mysqli('localhost', 'kastrivi_kastrivi', 'rootadmin@2019') or die(mysqli_error());
		//Select DB From database
		$db = mysqli_select_db($conn, 'kastrivi_kastriviquiz') or die("databse error");
		//Selecting database
		$query = mysqli_query($conn, "SELECT * FROM google_users WHERE email='".$email."'");
		$numrows = mysqli_num_rows($query);
		if($numrows == 0)
		{
			//Insert to Mysqli Query
			$sql = "INSERT INTO google_users(name,email,mobile,username,password) VALUES('$name','$email','$mobile','$username','$password')";
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


<p style=' font-size: 16px; font-family: Raleway;'>Please click  to activate your account</p>

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
header("Location: http://kastrivia.com/signup.php");

}
  }
				
			}
			else
			{
				header("Location: http://kastrivia.com/signup.php");
			}
		}
		else
		{
			echo "<script>";echo " alert('This email is already registered');window.location.href='http://kastrivia.com/signup.php';</script>";
			
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

