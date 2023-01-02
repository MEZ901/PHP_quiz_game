<?php
    if(isset($_POST["signup_btn"]))       signUpChecker();
    if(isset($_POST["login_btn"]))        loginChecker();
    if(isset($_GET["score"]))             getScore();

    function signUpChecker(){
        global $connect;
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT * FROM user WHERE `email` = '$email' OR `username` = '$username'";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() != 0) {
            $_SESSION["signUpMessage-field"] = "Sorry email or username already taken.";
        } else {
            user::signUp($username, $email, $password);
            $_SESSION["signUpMessage-success"] = "Account has been created successfully!";
        }
    }
    function loginChecker(){
        global $connect;
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT * FROM user WHERE `email` = '$email' AND `password` = '$password'";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            $newUser = new user($result[0]["user_id"], $result[0]["username"], $result[0]["email"], $result[0]["password"]);
            $newUser -> login();
        } else {
            $_SESSION["loginMessage-field"] = "Sorry email or password is incorrect";
        }
    }
    function getScore(){
        include "./database.php";
        include "../includes/autoloader.php"; 
        $userId = $_SESSION["id"];
        $score = $_GET["score"];
        $date = date("j / n / Y");
        $query = "INSERT INTO `score`(`user_id`, `score`, `date`) VALUES ('$userId','$score','$date')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
    }
?>