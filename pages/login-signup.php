<?php
    include "../services/database.php";
    include "../includes/autoloader.php";
    include "../services/user.services.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <style>
        body{
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            background-color: purple;
        }
        .main{
            width: 350px;
            height: 500px;
            background: red;
            overflow: hidden;
            background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
            border-radius: 10px;
            box-shadow: 5px 20px 50px #000;
        }
        #chk{
            display: none;
        }
        .signup{
            position: relative;
            width:100%;
            height: 100%;
        }
        label{
            color: #fff;
            font-size: 2.3em;
            justify-content: center;
            display: flex;
            margin: 60px;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
        }
        input{
            width: 60%;
            height: 20px;
            background: #e0dede;
            justify-content: center;
            display: flex;
            margin: 20px auto;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
        }
        .signup_btn{
            width: 60%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: #202731;
            font-size: 1em;
            font-weight: bold;
            margin-top: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
        }
        .signup_btn:hover{
            background: #373f4b;
        }
        .login_btn{
            width: 60%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: purple;
            font-size: 1em;
            font-weight: bold;
            margin-top: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
        }
        .login_btn:hover{
            background: rgb(177, 0, 177);
        }
        .login{
            height: 460px;
            background: #202731;
            border-radius: 60% / 10%;
            transform: translateY(-180px);
            transition: .8s ease-in-out;
        }
        .login label{
            color: white;
            transform: scale(.6);
        }

        #chk:checked ~ .login{
            transform: translateY(-500px);
        }
        #chk:checked ~ .login label{
            transform: scale(1);	
        }
        #chk:checked ~ .signup label{
            transform: scale(.6);
        }

        /* The alert message box */
        .alert-success {
            padding: 20px;
            background-color: #4BB543;
            color: white;
            margin-bottom: 15px;
        }
        .alert-field {
            padding: 20px;
            background-color: #f44336;
            color: white;
            margin-bottom: 15px;
        }
        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }
        .closebtn:hover {
            color: black;
        }

    </style>
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
        <?php if(isset($_SESSION["loginMessage-field"])): ?>
            <div class="alert-field">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?php
                    echo $_SESSION["loginMessage-field"];
                    unset($_SESSION["loginMessage-field"]);
                ?>
            </div>
        <?php endif ?>    
        <?php if(isset($_SESSION["signUpMessage-field"])): ?>
            <div class="alert-field">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?php
                    echo $_SESSION["signUpMessage-field"];
                    unset($_SESSION["signUpMessage-field"]);
                ?>
            </div>
        <?php endif ?>    
        <?php if(isset($_SESSION["signUpMessage-success"])): ?>
            <div class="alert-success">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?php
                    echo $_SESSION["signUpMessage-success"];
                    unset($_SESSION["signUpMessage-success"]);
                ?>
            </div>
        <?php endif ?>    
        <div class="signup">
            <form action="" method="POST">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="username" placeholder="User name" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button type="submit" name="signup_btn" class="signup_btn">Sign up</button>
            </form>
        </div>

        <div class="login">
            <form action="" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button type="submit" name="login_btn" class="login_btn">Login</button>
            </form>
        </div>
	</div>  
    <script src="../assets/script.js"></script>
</body>
</html>