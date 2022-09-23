<?php
require_once './config.php';
if (!isset($_SESSION["user_id"]) && $_SESSION["email"] == "") {
  // user already logged in the site
  header("location:" . SITE_URL);
}


if(!empty($_FILES['picture']['name'])){
    //Include database configuration file
    include_once 'connection.php';
    
    //File uplaod configuration
    $result = 0;
    $uploadDir = "uploads/";
    $fileName = time().'_'.basename($_FILES['picture']['name']);
    $targetPath = $uploadDir. $fileName;
    
    //Upload file to server
    if(@move_uploaded_file($_FILES['picture']['tmp_name'], $targetPath)){
        //Get current user ID from session
        $sess_email = $_SESSION["email"];
        
        //Update picture name in the database
        $update = mysqli_query($mysqli, "UPDATE google_users SET pic = '".$fileName."' WHERE email = '$sess_email'");
        
        //Update status
        if($update){
            $result = 1;
        }
    }
echo '<script type="text/javascript">window.top.window.completeUpload(' . $result . ',\'' . $targetPath . '\');</script>  ';
}

?>