<?php
if(isset($_POST["submit"])){
	if(!empty($_POST['email']) && !empty($_POST['password'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		//DB Connection
		$conn = new mysqli('localhost', 'kastrivi_kastrivi', 'rootadmin@2019') or die(mysqli_error());
		//Select DB From database
		$db = mysqli_select_db($conn, 'kastrivi_kastriviquiz') or die("database error");
		//Selecting database
		$query = mysqli_query($conn, "SELECT * FROM google_users WHERE email='".$email."' AND password='".$password."' AND pass_stat=1");
		$numrows = mysqli_num_rows($query);
		if($numrows != 0)
		{
		    while($row = mysqli_fetch_assoc($query))
			{
				$dbusername=$row['email'];
				$dbpassword=$row['password'];
				$name=$row['name'];
				$username=$row['username'];
				$pass_stat=$row['pass_stat'];
				$id=$row['id'];
				
			}
			
			if($pass_stat != 0){
			    
			    if($email == $dbusername && $password == $dbpassword)
			{
				session_start();
				$_SESSION['email']=$email;
				$_SESSION['name']=$name;
				$_SESSION['user_id']=$id;
				$_SESSION['username']=$username;

				//Redirect Browser
				header("Location: https://www.kastrivia.com/userprofile.php");
			}
			    
			}else{
			    
			    session_start();
				$_SESSION['email']=$email;
			    header("Location: http://kastrivia.com/changepass.php?email=$email");
			    
			}
			
			
		}
		else
		{
			
			
			echo "<script>";echo " alert('This account is not activated yet, please check your email');window.location.href='http://kastrivia.com/signin.php';</script>";
		}
	}
	else
	{
		echo "Required All fields!";
	}
}
?>