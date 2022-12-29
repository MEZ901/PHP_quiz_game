<?php
    abstract class person {
        protected $id;
        protected $username;
        protected $email;
        protected $password;

        public function __construct($id, $username, $email, $password){
            $this -> id = $id;
            $this -> username = $username;
            $this -> email = $email;
            $this -> password = $password;
        }
        
        public function getId(){
            return $this -> id;
        }
        public function getUsername(){
            return $this -> username;
        }
        public function getEmail(){
            return $this -> email;
        }
        public function getPassword(){
            return $this -> password;
        }

        abstract public function login();
        abstract public function showQuestions();
    }
?>