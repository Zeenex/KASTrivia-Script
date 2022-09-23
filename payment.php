<?php

$number = $_GET['n'];

if(isset($_POST["submit"])){
	if(!empty($_POST['card_num']) && !empty($_POST['month']) && !empty($_POST['year']) && !empty($_POST['cvv'])){
	    
	    $card_num = $_POST['card_num'];
	    $month = $_POST['month'];
	    $year = $_POST['year'];
	    $cvv = $_POST['cvv'];
	    
	    
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
<link rel="stylesheet" type="text/css" href="css/user.css">
<link rel="stylesheet" type="text/css" href="css/quiz.css">
<link rel="stylesheet" type="text/css" href="css/payment.css">


<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Karla:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.paystack.co/v2/paystack.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="js/app.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/modal.js"></script>



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


  <div class="userimg">

      
  </div>

  
            <div class="user-title" id="name">
             
            <h2><?php echo $_SESSION["name"] ?></h2>
            
            </div>
            
            </div>
     <div class="played-count"></div>
     <div class="played-count"></div> 
 
   
 

  <div class="pay-rate">
     
     <div class="pay-left">
      <h1>Pay with Card</h1>
       <div onclick="payWithPaystack()" class="pay-card"></div>
       
     </div>
     

   </div>

   
   
   <div class="logout"><a class="btn btn-block btn-social btn-google-plus" href="logout.php"><i class="fa fa-times" aria-hidden="true"></i></a></div>
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

    <form action="" method="post" enctype="multipart/form-data">
    <div style="float:left; "><b>Your Unique Invite Code</b><br>
    <input type="text" value="dankas29" />
    <input type="submit" value="Invite Friend" />
    </form>
    </div>
  </div>

</div>

  <div id="myModalPay" class="modalpay">

  <!-- Modal content -->
  <div class="modal-content-pay">
    <span class="close">&times;</span>
    

<form class="pay-form" autocomplete="on" action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method='post' id='paystack-card-form'>  
    <div class="pay-row">
        <div class="p-flex"></div>
        <div class="c-flex"> 
        
        <label>CARD NUMBER</label>
        <input type="text" name="card_num"value="" placeholder="0000 0000 0000 0000" />
        </div>
        <div class="row-flex">
            
           <div class="flex-left"> 
           <label>EXPIRY DATE</label>
           <div class="d-flex">
            <div class="flex-left-m">
                <select id="mm-sel" name="month">
                    <option>MM</option>
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                </select>
                </div>
           <div class="flex-left-y">
               
               <select id="yy-sel" name="year">
                    <option>YY</option>
                    <option>19</option>
                    <option>20</option>
                    <option>21</option>
                    <option>22</option>
                    <option>23</option>
                    <option>24</option>
                    <option>25</option>
                    <option>26</option>
                    <option>27</option>
                    <option>29</option>
                    <option>30</option>

                    
                </select>
               
           </div>
               
           </div>
           </div>
           
        <div class="flex-right"> 
        <label>CVV CODE</label>
        <input type="text" name="cvv" value="" placeholder="987" />
        </div> 
            
        </div>
        
        <div class="c-flex"> 
        <input type="submit" name="submit" value="Pay &#8358; 150" placeholder="Pay 150" />
        </div>
        
   </form>     
        
        
    </div>

    </div>
  </div>


</div>


</div>

<!-- end content section --> 



<div class="footer">  
 


  <div class="faq-footer-bottom">    
    <div class="fbt-one">
      <p>CATEGORIES</p>      
        <li><a href="http://www.kastrivia.com/category.php">Sports</a></li>
        <li><a href="http://www.kastrivia.com/category.php">Music</a></li>
        <li><a href="http://www.kastrivia.com/category.php">Movies</a></li>  

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



    


</body>
</html> 
