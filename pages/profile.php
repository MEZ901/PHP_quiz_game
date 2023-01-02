<?php
    include "../includes/autoloader.php";
    include "../services/database.php";
    include "../services/user.services.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/main.css">

    <title>Profile</title>
</head>
<body class="profile_body">
    <div class="profile_container">
        <div class="profile">
            <div>
                <p><?= $_SESSION['username'] ?></p>
                <button onclick="window.location.href='../index.php?logout'">Logout</button>
            </div>
            <p>Score history</p>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Score</th>
                </tr>
                <?php 
                    $newUser = new user($_SESSION["id"], $_SESSION["username"], $_SESSION["email"], $_SESSION["password"]);
                    $newUser -> scoreHistory();
                ?>
            </table>
            <a href="../index.php"><button class="back">Back to home</button></a>
        </div>
        <img src="../assets/img/Binary code-pana.svg" alt="">
    </div>
</body>
</html>