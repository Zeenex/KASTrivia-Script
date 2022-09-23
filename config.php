<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
session_start();



define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'kastrivi_kastrivi');
define('DB_SERVER_PASSWORD', 'rootadmin@2019');
define('DB_DATABASE', 'kastrivi_kastriviquiz');

$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}

/* make sure the url end with a trailing slash */
define("SITE_URL", "http://kastrivia.com");
/* the page where you will be redirected for authorzation */
define("REDIRECT_URL", SITE_URL."/login.php");

/* * ***** Google related activities start ** */
define("CLIENT_ID", "302470382097-fhf9g0gjrqsbgr2aogvuuipuaqqh7r7t.apps.googleusercontent.com");
define("CLIENT_SECRET", "_2qQScAbnJKNHDgoG2Fdszze");

/* permission */
define("SCOPE", 'https://www.googleapis.com/auth/userinfo.email '.
		'https://www.googleapis.com/auth/userinfo.profile' );



/* logout both from google and your site **/
define("LOGOUT_URL", "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=". urlencode(SITE_URL."/logout.php"));
/* * ***** Google related activities end ** */
?>