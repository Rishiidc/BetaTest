<!DOCTYPE html>
<html>
    <head>
        <title>Login to BetaTest</title>
        <meta charset="UTF-8">
        <meta lang="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href="../img/Logo[White].png">
        <link rel="stylesheet" href="../styles/login.css">
        <link rel="stylesheet" href="../styles/button.css">
    </head>
    <body>
        <div id="particles-js"></div>
        <script src="../js/particles.js"></script>
        <script  cript src="../js/app.js"></script>

        <div class="headers">

            <div class="right">
                <div class="logo"></div>
            </div>

            <div class="left">
                <div class="home-link">
                    <a href="../" >BetaTest</a>
                </div>
                <div class="heading">
                    Login
                </div>
            </div>

        </div>
        <div class="login-form">
            <form method="POST">
                <div class="form" id="loginform">
                    <div class="heading">
                        <div class="title">Welcome!</div>
                        <div class="subtitle">Login to BetaTest.</div>
                    </div>
                    <div class = 'input-container'>
                      <input id="mail" name="email" type="email" placeholder=" " required/>
                      <div class="placeholder">E-mail</div>
                    </div>
                    <div class = 'input-container'>
                      <input id="pass" name="password" type="password" placeholder=" " required/>
                      <div class="placeholder">Password</div>
                    </div>
                    <?php  
                    if(isset($_POST['email'])){
                        require_once("./auth/connect.php");
                        
                        $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
                        $password = mysqli_real_escape_string($mysqli,hash("SHA256",$_POST["password"]));
                        
                        $stmt = $mysqli->prepare("SELECT * FROM `users`");
                        // $stmt->bind_param("ss", $email, $password);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        $allow_entry = false;
                        foreach($data as $x => $value){
                            if($value['email'] == $email && $value['password'] == $password){
                                print_r($value['email'], $email);
                                print_r($value['password'], $password);
                                $allow_entry = true;
                                session_start();
                                // $_SESSION['auth'] = 'auth';
                                // $_SESSION['uname'] = $value['username'];
                                // $_SESSION['userid'] = $value['user_id'];
                                // $_SESSION['levels'] = $value['levels'] + 1;
                                // $_SESSION['points'] = $value['points'];
                                // $_SESSION['play-level'] = $value['levels'];
                                // $_SESSION['banned'] = $value['banned'];
                                $_SESSION = $value;
                                header("Location: /pages/play-screens/play.php?answer=");
                                print_r($_SESSION);
                            }
                            // print_r($value['email']);
                            // print_r($value['password']);
                        }
                        if(!$allow_entry == true){
                            echo "<p style = 'color: red;'>Email and/or Password is Incorrect!</p>";
                        }
                    }
                    ?>
                    <button type="text" class="submit">Submit</button>
                </div>
            </form>
        </div>

        <div class="register">
            <button class="btn draw-border" onclick="window.location.href='./register.php'">Not registered? Sign up here!</button>
        </div>
        <!--<script src = "../js/maintanence.js"></script>-->
    </body>
</html>