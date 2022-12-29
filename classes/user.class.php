<?php
    class user extends person {
        public static function signUp($username, $email, $password){
            global $connect;
            $query = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";
            $stmt = $connect->prepare($query);
            $stmt->execute();
        }
        public function login(){
            $_SESSION["id"] = $this->id;
            $_SESSION["username"] = $this->username;
            $_SESSION["email"] = $this->email;
            $_SESSION["password"] = $this->password;
            $_SESSION["loginMessage-success"] = "welcome back ". $this->username;
            header("location: ../index.php");
        }
        public function showQuestions(){

        }
        public function scoreHistory(){

        }
    }
?>