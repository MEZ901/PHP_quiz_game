<?php
    class user extends person {
        public static function signUp($username, $email, $password){
            global $connect;
            $query = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";
            $stmt = $connect->prepare($query);
            $stmt->execute();
        }
        public function login(){

        }
        public function showQuestions(){

        }
        public function scoreHistory(){

        }
    }
?>