<?php
    include "./services/database.php";
    include "./includes/autoloader.php";
    include "./services/user.services.php";

    if(isset($_GET['logout'])){
        session_unset();
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/main.css">
    <script src="https://kit.fontawesome.com/e29eb6764b.js" crossorigin="anonymous"></script>
    <title>PHP quiz</title>
</head>
<body>
    <header class="index-header">
        <div class="Logo">
            <h1 class="header">PHQuiz</h1>
            <p class="header">PROVE YOUR <span>PHP</span> SKILLS TO THE WORLD!</p>
        </div>
        <?php if(!isset($_SESSION["username"])): ?>
            <div class="identification">
                <a href="./pages/login-signup.php" class="sign-up">Sign up</a>
                <a href="./pages/login-signup.php" class="login">Login</a>
            </div>
        <?php endif; ?>
        <?php if(isset($_SESSION["username"])): ?>
            <div class="profile" onclick="window.location.href='./pages/profile.php'">
                <p><?= $_SESSION["username"] ?></p>
                <i class="fa-solid fa-user"></i>
            </div>
        <?php endif; ?>
    </header>
    <section class="main">
        <div class="action">
            <?php if(isset($_SESSION["loginMessage-success"])): ?>
                <div class="alert-success">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?php
                    echo $_SESSION["loginMessage-success"];
                    unset($_SESSION["loginMessage-success"]);
                ?>
                </div>
            <?php endif; ?>
            <p>The goal of this quiz is to test your skills and knowledge in PHP. All what you have to do is clicking on the button below and <br>prove yourself to <span>the world!</span></p>
            <?php if(!isset($_SESSION["username"])): ?>
                <a href="./pages/Quiz-Page.php"><button disabled>TAKE THE QUIZ</button></a>
            <?php endif; ?>
            <?php if(isset($_SESSION["username"])): ?>
                <a href="./pages/Quiz-Page.php"><button>TAKE THE QUIZ</button></a>
            <?php endif; ?>
        </div>
        <img src="./assets/img/women-code.webp" alt="cover">
        <div class="wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </section>
    <script src="./assets/script.js"></script>
</body>
</html>