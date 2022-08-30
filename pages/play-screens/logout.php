<?php   

session_start();
unset($_SESSION);
session_destroy(); 
header("Location: ../login.php"); //to redirect back to "loginpage.php" after logging out
unset($_SESSION);
$_SESSION = array();
exit();

?>