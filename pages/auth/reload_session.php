<?php 
$stmt = $mysqli->prepare("SELECT * FROM `users` WHERE username = '".$_SESSION['username']."' ");
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();

$_SESSION = $data;
?>