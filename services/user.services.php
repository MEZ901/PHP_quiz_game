<?php
    if(isset($_POST["signup_btn"]))  signUpChecker();

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
            $_SESSION["signUpMessage"] = "Sorry email or username already taken.";
        } else {
            user::signUp($username, $email, $password);
            $_SESSION["signUpMessage"] = "Account has been created successfully!";
        }
    }
?>