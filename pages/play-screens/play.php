<?php
session_start();
require_once("../auth/connect.php");
if (isset($_SESSION['username']))
{
  // $auth = $_SESSION["auth"];
}
else
{
header("Location: /pages/login.php");
}
require_once("../auth/reload_session.php");

                          $ip_address = getenv("REMOTE_ADDR");
                          // $stmt = $mysqli->prepare("INSERT INTO `ips` (`ip`) VALUES ('".$ip_address."')");
                          $stmt = $mysqli->prepare("INSERT INTO ips (ip, username)
                            SELECT * FROM (SELECT '".$ip_address."', '".$_SESSION['username']."') AS tmp
                            WHERE NOT EXISTS (
                            SELECT ip FROM ips WHERE ip = '".$ip_address."'
                          ) LIMIT 1;
                          ");
                          $stmt->execute();
                          $stmt->close();

$stmt = $mysqli->prepare("SELECT * FROM `questions`"); 
$stmt->execute();
$result = $stmt->get_result();
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($data as $x => $value){
  if($x == $_SESSION['levels']){
    $answer = $value['answer'];
    $question = $value['question'];
    if($_SESSION['levels'] == 0){
      $stmt = $mysqli->prepare("UPDATE `users` SET `banned` = '1' WHERE user_id = '".$_SESSION['user_id']."' ");
      $stmt->execute();
      $stmt->close();
    }
  }
}
?>

<!DOCTYPE html>
<html>
    <head>
      <title>Play</title>
        <meta charset="UTF-8">
        <meta lang="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel = "icon" href="../../img/Logo[White].png">
        <link rel="stylesheet" href="../../styles/play.css">
    </head>
      <body>
        <div id="particles-js"></div>
        <script src="../../js/particles.js"></script>
        <script  cript src="../../js/app.js"></script>

          <?php 
            if($_SESSION['banned'] == 0){
              foreach($data as $x => $value){
                if($x == $_SESSION['levels']){
                    if(isset($value['hints'])){
                        echo("<!--".$value['hints']."-->");   
                    }
                }
              }
            }
          ?>

           <div class="headers">
            <div class="left">
              <div class="home-link"><a href="../../">BetaTest</a></div>
              <div class="heading">Play</div>
            </div>

            <div class="right">
              <a href="../../pages\play-screens\logout.php">Logout</a>
              <a href="../../">Home</a>
              <a class = 'current' href="../play-screens/play.php?answer=">Play</a>
              <a href="../play-screens/profile.php">Profile</a>
              <a href="../play-screens/leaderboard.php">Leaderboard</a>
            </div>
          </div>

            <!-- Play form -->
            <div class="play-container">
              <div class="play-content">
                <div class="level">
                    Thank you For Participating in BetaTest 2022, See you next year! 
                </div>
              </div>
            </div>
            <!-- Play form -->
            <!-- background -->

            <!-- background -->
          <div class="dev-con">
            <div class="school">
              &copy; ProjectBeta 2022 | Sanskriti School
            </div>
            <div class="developers">
              Made with ♥ By Shreyas Vartia &copy; &#8482; and Rishi Mathur &copy; &#8482;
            </div>
          </div>

          <script src = '../../js/finishlevel.js'></script>
          <!--<script src = "../../js/maintanence.js"></script>-->
      </body>
</html>