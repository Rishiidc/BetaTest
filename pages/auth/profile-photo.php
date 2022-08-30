<?php 
session_start();
require_once("./connect.php");
// require_once("./reload_session.php");

$img_ex = strtolower(pathinfo($_FILES['player_image']['name'], PATHINFO_EXTENSION));
$new_img_name = uniqid("IMG-", true).'.'.$img_ex;
$img_path = '../../uploads/'.$new_img_name;
// print_r($_FILES['player_image']);
// print_r($img_ex);
// print_r("\n");
// print_r($new_img_name);
// print_r("\n");
// print_r($img_path);
// print_r("\n");

move_uploaded_file($_FILES['player_image']['tmp_name'], $img_path);
// print_r($img_path);

$stmt = $mysqli->prepare("UPDATE `users` SET `image_url` = '".$img_path."' WHERE username = '".$_SESSION['username']."'");
$stmt->execute();
$stmt->close();

header("Location: /pages/play-screens/profile.php");
?>