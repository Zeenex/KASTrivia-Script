<?php

require_once './config.php';
if (!isset($_SESSION["username"]) || !isset($_SESSION["email"])) {
  // user already logged in the site
  header("location:" . SITE_URL);
}

include_once("connection.php");
$sess_name = $_SESSION["name"];
$sess_email = $_SESSION["email"];


$usedet = mysqli_query($mysqli, "SELECT * FROM google_users WHERE email='$sess_email'");
while($row=mysqli_fetch_array($usedet)){
    
    $phone = $row['mobile'];
    $username = $row['username'];
    $play_lives = $row['lives'];
    $num_play = $row['num_play'];
    $claim = $row['claim'];
    $share = $row['share'];
}

$result = mysqli_query($mysqli,"SELECT * FROM google_users WHERE email='$sess_email'");
$rows = $result->fetch_assoc();

//User profile picture
$userPicture = !empty($rows['pic'])?$rows['pic']:'no-image.png';
$userPictureURL = 'uploads/'.$userPicture;


$results = mysqli_query($mysqli, "SELECT rank, id FROM (SELECT @rank:=@rank+1 AS rank, id, email FROM google_users, (SELECT @rank := 0) r ORDER BY claim DESC) t WHERE email='$sess_email'");
while($row=mysqli_fetch_array($results)){

$pos = $row['rank'];
}

function addOrdinalNumberSuffix($num) {
    if (!in_array(($num % 100),array(11,12,13))){
      switch ($num % 10) {
        // Handle 1st, 2nd, 3rd
        case 1:  return $num.'st';
        case 2:  return $num.'nd';
        case 3:  return $num.'rd';
      }
    }
    return $num.'th';
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
<link rel="stylesheet" type="text/css" href="css/quiz.css">

<script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="js/app.js"></script>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Karla:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript" src="js/modal.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    //If image edit link is clicked
    $(".editLink").on('click', function(e){
        e.preventDefault();
        $("#fileInput:hidden").trigger('click');
    });

    //On select file to upload
    $("#fileInput").on('change', function(){
        var image = $('#fileInput').val();
        var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        
        //validate file type
        if(!img_ex.exec(image)){
            alert('Please upload only .jpg/.jpeg/.png/.gif file.');
            $('#fileInput').val('');
            return false;
        }else{
            
            $('#uploadForm').hide();
            $( "#picUploadForm" ).submit();
        }
    });
});

//After completion of image upload process
function completeUpload(success, fileName) {
    if(success == 1){
        $('#imagePreview').attr("src", "");
        $('#imagePreview').attr("src", fileName);
        $('#fileInput').attr("value", fileName);
        $('.uploadProcess').hide();
    }else{
        alert('There was an error during file upload!');
    }
    return true;
}
</script>


</head>


<body>

<!-- Start content section -->
<div class="profile-content"> 
  <div class="nav" id="myTopnav">    
    <a href="index.php">Home</a>
    <a href="leaderboard.php">Leaderboard</a>
    <a href="faq.html">FAQ</a>
    <a href="signup.php"><button class="btn-default">Play</button></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
  </div>

<div class="userrow">
    <div id="status"></div>

<div class="userprof">

 <form method="post" action="upload.php" enctype="multipart/form-data" id="picUploadForm" target="uploadTarget">
<iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
  <div class="userimg">
      <input type="file" name="picture" id="fileInput"  style="display:none"/>
      <img src="<?php echo $userPictureURL; ?>" id="imagePreview">
      <a class="editLink" href="javascript:void(0);"><div id="imgChange"><span>Change Photo</span>
        
      </div></a>
      
  </div>
     </form> 
  
            <div class="user-title" id="name">
             
            <h2><?php echo $_SESSION["name"] ?>     (<?php echo $username; ?>) </h2>
            
            </div>
            
            </div>
     <div class="played-count">&#60; Played <?php echo $num_play; ?>  times &#62;</div>
     <div class="played-count">Rank</div> 
  <div class="rank-rate">
     
     <div class="rank-rate-left">
       <h3>All Time Highest Position</h3>
       <h3><?php echo addOrdinalNumberSuffix($pos); ?><h3>

     </div>
     <div class="rank-rate-right">
       <h2>This week</h2>
       
     </div>
   </div>
   
 

  <div class="prize-rate">
     
     <div class="prize-left">
      <h1>Total Winnings</h1>
       <h2 style="margin: 10px auto">&#8358;<?php echo $claim; ?></h2>
       <button>Claim</button>
     </div>
     
     <div class="prize-right">
      <h1>Lives left</h1>
       <div class="prize-hrt"><h2><?php echo $play_lives; ?></h2></div>
       <button id="myBtnPay">Get more life</button><button id="myBtn">Get free life</button>
     </div>

   </div>

   <div class="lb-bottom"><button onclick="window.location.href='leaderboard.php'">Leaderboard</button></div>
   
   <div class="logout"><a class="btn btn-block btn-social btn-google-plus" href="logout.php"><i class="fa fa-times" aria-hidden="true"></i></a></div>
</div>

<div class="user-bottom">
     <div class="user-bottom-left">
         
         <h5>Live Trivia starts in:</h5>
         <p>0days: 0hrs: 0mins: 0sec</p>
         <button>Register</button>
     </div>
    <form action="checklive.php" method="POST" enctype="multipart/form-data"> 
     <div class="user-bottom-right">
         <h5>Win exciting cash price</h5>
         
        <input type="submit" value="Play">
        
     </div>
    </form>
   </div>
   
  <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    
    <div class="modal-content-left">
        <h5>Want to play more?</h5>

<p>Get a free life to play more when you refer a friend to KAS Trivia</p>
    </div>
    <div class="modal-content-right"></div>

    <form action="refer.php" method="post" enctype="multipart/form-data">
    <div style="float:left; "><b>Your Unique Invite Code - </b> <?php echo $share; ?><br>
    <input type="text" name="ref_id" value="" />
    <input type="submit" name="submit" value="Get Life" />
    </form>
    </div>
  </div>

</div>

  <div id="myModalPay" class="modalpay">

  <!-- Modal content -->
  <div class="modal-content-pay">
    <span class="close">&times;</span>
    
    <div class="modal-content-top"></div>
    
    <div class="modal-content-mid"><p>Never miss a moment away from your game. Purchase more life.</p></div>
    
    <div onclick="payWithPaystack150()" class="modal-content-card">3 lives @NGN 150 : 6 games</div>
    <div onclick="payWithPaystack250()"class="modal-content-card">6 lives @NGN 250 : 12 games</div>
    <div onclick="payWithPaystack350()" class="modal-content-card">12 lives @NGN 500 : 24games</div>

    </div>
  </div>


</div>


</div>

<!-- end content section --> 



<div class="footer">  
 


  <div class="faq-footer-bottom">    
    <div class="fbt-one">
      <p>CATEGORIES</p>      
        <li><a href="category.php">Sports</a></li>
        <li><a href="category.php">Music</a></li>
        <li><a href="category.php">Movies</a></li>  

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
$(function() {
    $('#profile-image').on('click', function() {
        $('#profile-image-upload').click();
    });
});
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

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
// Get the modal
var modalpay = document.getElementById("myModalPay");

// Get the button that opens the modal
var a = document.getElementById("myBtnPay");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[1];

// When the user clicks the button, open the modal 
a.onclick = function() {
  modalpay.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modalpay.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modalpay.style.display = "none";
  }
}
</script>

<script>
// Get the modal
var modaledit = document.getElementById("myModaledit");

// Get the button that opens the modal
var btn = document.getElementById("myBtnedit");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[2];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modaledit.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modaledit.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modaledit.style.display = "none";
  }
}
</script>


<script type="text/javascript">

    function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            

            reader.onload = function (e) {

                $('#profile-image').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);

        }

    }

    $("#profile-image").change(function(){

        readURL(this);

    });

</script>
    
<script>
    
    function payWithPaystack150() {

    var handler = PaystackPop.setup({ 
        key: 'pk_test_3c3d63a9922a0124a2268276e4eec6f24ce8d333', //put your public key here
        email: '<?php echo $sess_email; ?>', //put your customer's email here
        amount: 15000, //amount the customer is supposed to pay
        metadata: {
            custom_fields: [
                {
                    display_name: "<?php echo $sess_name; ?>",
                    variable_name: "<?php echo $sess_name; ?>",
                    value: "<?php echo $phone; ?>" //customer's mobile number
                }
            ]
        },
        callback: function (response) {
            //after the transaction have been completed
            //make post call  to the server with to verify payment 
            //using transaction reference as post data
            alert('success. transaction ref is ' + response.reference);window.location.href='payment/150pay.php';
        },
        onClose: function () {
            //when the user close the payment modal
            alert('Transaction cancelled');
        }
    });
    handler.openIframe(); //open the paystack's payment modal
}

function payWithPaystack250() {

    var handler = PaystackPop.setup({ 
        key: 'pk_test_3c3d63a9922a0124a2268276e4eec6f24ce8d333', //put your public key here
        email: '<?php echo $sess_email; ?>', //put your customer's email here
        amount: 25000, //amount the customer is supposed to pay
        metadata: {
            custom_fields: [
                {
                    display_name: "<?php echo $sess_name; ?>",
                    variable_name: "<?php echo $sess_name; ?>",
                    value: "<?php echo $phone; ?>" //customer's mobile number
                }
            ]
        },
        callback: function (response) {
            //after the transaction have been completed
            //make post call  to the server with to verify payment 
            //using transaction reference as post data
           alert('success. transaction ref is ' + response.reference);window.location.href='payment/250pay.php';
        },
        onClose: function () {
            //when the user close the payment modal
            alert('Transaction cancelled');
        }
    });
    handler.openIframe(); //open the paystack's payment modal
}

function payWithPaystack350() {

    var handler = PaystackPop.setup({ 
        key: 'pk_test_3c3d63a9922a0124a2268276e4eec6f24ce8d333', //put your public key here
        email: '<?php echo $sess_email; ?>', //put your customer's email here
        amount: 50000, //amount the customer is supposed to pay
        metadata: {
            custom_fields: [
                {
                    display_name: "<?php echo $sess_name; ?>",
                    variable_name: "<?php echo $sess_name; ?>",
                    value: "<?php echo $phone; ?>" //customer's mobile number
                }
            ]
        },
        callback: function (response) {
            //after the transaction have been completed
            //make post call  to the server with to verify payment 
            //using transaction reference as post data
            alert('success. transaction ref is ' + response.reference);window.location.href='payment/350pay.php';
        },
        onClose: function () {
            //when the user close the payment modal
            alert('Transaction cancelled');
        }
    });
    handler.openIframe(); //open the paystack's payment modal
}
</script>

</body>
</html> 
