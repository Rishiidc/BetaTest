<?php
session_start();
require_once("../auth/connect.php");
// print_r($_SESSION);
require_once("../auth/reload_session.php");

$stmt = $mysqli->prepare("SELECT * FROM `users`");
$stmt->execute();

$result = $stmt->get_result();

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Leaderboard</title>
        <meta charset="UTF-8">
        <meta lang="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href="../../img/Logo[White].png">
        <link rel="stylesheet" href="../../styles/leaderboard.css">
        <link rel="stylesheet" href="../../styles/button.css">
    </head>
    <body>
        <div id="particles-js"></div>
        <script src="../../js/particles.js"></script>
        <script  cript src="../../js/app.js"></script>

        <div class="header">
            <div class="left">
                <div class="home-link">
                    <a href="../../" >BetaTest</a>
                </div>
                <div class="heading">Leaderboard</div>
            </div>
            <div class="right">
                <a href="../../pages\play-screens\logout.php">Logout</a>
                <a href="../../">Home</a>
                <a href="../play-screens/play.php?answer=">Play</a>
                <a href="../play-screens/profile.php">Profile</a>
                <a class = 'current' href="../play-screens/leaderboard.php">Leaderboard</a>
            </div>
        </div>
            <!--<div class='maintanence_heading'>Come Back When You're Required, Go to the Pub for now you tired old wash buckler.</div>-->
            <div class="flexify">
            <div class="board-container">
                <div class="heading">
                    Leaderboard
                </div>
                <div class="search-bar">
                    <input type="search"
                    placeholder="Search..."
                    id = 'search'
                    data-search>
                </div>
                <div class="content">
                    <div id = 'rank' class="rank">
                        <div class = 'content-header'>RANK</div>
                    </div>
                    <div id = 'username' class="username">
                        <div class = 'content-header'>USERNAME</div>
                        <?php 
                        foreach($data as $x => $value){
                            if($value['banned'] == 1){
                                echo "<div class='user'>banned {$value['username']}</div>";
                            }else{
                                echo "<div class='user'>{$value['username']}</div>";
                            }
                        }
                        ?>
                    </div>
                    <div id = 'levels' class ="levels">
                        <div class = 'content-header'>LEVEL</div>
                        <?php 
                        foreach($data as $x => $value){
                            echo "<div class='level'>{$value['levels']}</div>";
                        }
                        ?>
                    </div>
                    <div id = 'points' class ="points">
                        <div class = 'content-header'>POINTS</div>
                        <?php 
                        foreach($data as $x => $value){
                            echo "<div class='point'>{$value['points']}</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script src = '../../js/leaderboard.js'></script>
        <script>
            const all_users = document.querySelectorAll('.user');

            all_users.forEach(element => {
                element.addEventListener('click', (data)=>{
                    var user_name = data.target.innerText;
                    console.log(user_name);

                    var url = "../../pages/play-screens/foreign-profile.php?name=" + user_name;

                    window.location = `${url}`;
                })
            });
        </script>
        <script>
            // document.querySelector('.flexify').remove();
            // const maintenance = document.createElement('div');
            // maintenance.classList.add('maintanence_heading');
            // maintenance.innerText = "Under Maintenance";
            // document.body.appendChild(maintenance);
        </script>
        <!--<script src = "../../js/maintanence.js"></script>-->
    </body>
</html>