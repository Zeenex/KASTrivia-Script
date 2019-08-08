<!DOCTYPE html>
<html>
<head>
<title>KASTrivia</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/rtl.css">

<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Karla:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="../js/faq.js"></script>

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

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
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


<div class="faq-title"> <p>Administrator Dashboard</p></div>

<div class="cat-row">

<div class="cat-left">
  
  <div class="cat-menu">

  <button class="showButton show">View Registered Users</button>
  <button class="hideButton hidden">View Registered Users</button>
  
  
  <button class="showButton-mu show-mu">Deactivte User</button>
  <button class="hideButton-mu hidden-mu">Deactivte User</button>
  
  <button class="showButton-mo show-mo">Add Questions</button>
  <button class="hideButton-mo hidden-mo">Add Questions</button>

<button class="showButton-mo show-mo">Add Answers</button>
  <button class="hideButton-mo hidden-mo">Add Answers</button>

  </div>

</div>

<div class="cat-right">
  
  <div class="hidden">
    <?php
       
       //DB Connection
		$conn = new mysqli('localhost', 'kastrivi_kastrivi', 'rootadmin@2019') or die(mysqli_error());
		//Select DB From database
		$db = mysqli_select_db($conn, 'kastrivi_kastriviquiz') or die("database error");
		//Selecting database 
        
        $sql = mysqli_query($conn, "SELECT * FROM google_users");
    ?>
    
<table id="customers">
  <tr>
  <th>Full Name</th>
  <th>Email</th>
  <th>Mobile</th>
  <th>Username</th>
  <th>Lives Left</th>
  <th>Claim</th>
  <th>All Time Score</th>
  <th>Account Stat</th>
 </tr>
 <?php
 
 while($data = mysqli_fetch_array($sql)){
    echo '
    <tr class="text-left">
        <td>'.$data['name'].'</td>
        <td>'.$data['email'].'</td>
        <td>'.$data['mobile'].'</td>
        <td>'.$data['username'].'</td>
        <td>'.$data['lives'].'</td>
        <td>'.$data['claim'].'</td>
        <td>'.$data['score'].'</td>
        <td>'.$data['pass_stat'].'</td>
    </tr>

    ';


}
 
 
 
 
 ?>
 
 
 
 
 
 
 

</table>
    


  </div>
  
  <div class="hidden-mu">
    
  </div>

    <div class="hidden-mo">
   
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
