<?php
require_once('./config.php');
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["name"])) {
  // user already logged in the site
  header("location:" . SITE_URL);
}
$sess_name = $_SESSION["name"];

if(isset($_POST['submit']))
{
    //database settings
    include "connection.php";
    
    $val = trim($_POST['user']);
    
    echo $val; echo " ";

    if(!empty($val))
        {
            //update the values
            mysqli_query($mysqli, "UPDATE google_users SET name = '$val' WHERE name = '$sess_name'");
            echo "Success";
            header("Location: logout.php");
        } else {
            echo "not updated";
            header("Location: userprofile.php");
        }

} else {
    echo "Invalid Requests";
}
?>

