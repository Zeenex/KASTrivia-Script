<?php include 'database.php';
require_once('../config.php');
if (!isset($_SESSION["name"]) || !isset($_SESSION["email"])) {
  // user already logged in the site
  header("location:" . SITE_URL);
}
$sess_name = $_SESSION["name"];
$sess_email = $_SESSION["email"];

if($_POST){
    
    $number = $_POST['number'];
    $cat_name = $_POST['category'];
    $selected_choice = $_POST['choice'];
    $total = $_POST['total_num'];
    $ques_num = $_POST['ques_num'];
    $next=$number+1;
    
    $score = 0;

    $qs = mysqli_query($mysqli, "SELECT * FROM choices WHERE question_number='$ques_num' AND is_correct=1");
    while($row=mysqli_fetch_array($qs)){
    $correct_choice=$row['choice'];
    }
    
    
    
    if($correct_choice == $selected_choice){
        
       mysqli_query($mysqli, "UPDATE leaderboard SET category='$cat_name',total='$total',score=score + 10 WHERE email='$sess_email'");
       
	}else{
	    
	    $scr = mysqli_query($mysqli, "SELECT * FROM leaderboard WHERE email='$sess_email'");
	    while($rows=mysqli_fetch_array($scr)){
        $wrong_choice=$rows['score'];
        }
	    
	    
	    
        mysqli_query($mysqli, "UPDATE leaderboard SET category='$cat_name',score='$wrong_choice',wrong=wrong + 1 WHERE email='$sess_email'");
	    
	}
   
    if($number == $total){
        
        $qs = mysqli_query($mysqli, "SELECT * FROM leaderboard WHERE email='$sess_email'");
    while($row=mysqli_fetch_array($qs)){
    $wrong_ans=$row['wrong'];
    
}

$correct_ans = $total - $wrong_ans;

switch ($correct_ans) {
    case "10":
        mysqli_query($mysqli, "UPDATE google_users SET claim=claim + 150 WHERE email='$sess_email'");
        break;
    case "9":
        mysqli_query($mysqli, "UPDATE google_users SET claim=claim + 100 WHERE email='$sess_email'");
        break;
    case "8":
        mysqli_query($mysqli, "UPDATE google_users SET claim=claim + 50 WHERE email='$sess_email'");
        break;
    default:
        mysqli_query($mysqli, "UPDATE google_users SET claim=claim WHERE email='$sess_email'");
}

mysqli_query($mysqli, "UPDATE google_users SET num_play=num_play+1 WHERE email='$sess_email'");

		header("Location: final.php");
		
		exit();
	} else {
	        header("Location: question.php?n=".$next."&category_name=$cat_name");
	}
    
}

?>
