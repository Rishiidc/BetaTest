<?php
$db_server = "localhost";
$db_user = "u926176960_beta";
$db_password = "B=3cn+OfvTv";
$db_database = "u926176960_betatest_db";

$mysqli = new mysqli($db_server,$db_user,$db_password,$db_database);
if($mysqli->connect_error) {
    exit('Error connecting to database');
  }
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $mysqli->set_charset("utf8mb4");
?>