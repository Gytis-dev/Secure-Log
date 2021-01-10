<?php
require("routes.php");
require("functions.php");

if (isset($_POST["submit"])){
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $pass = $_POST["password"];
    $passConfirm = $_POST["password_confirm"];
    $checkbox = @$_POST["conditions"];
    $passLength = strlen($pass);
    $encrypt = password_hash($pass, PASSWORD_DEFAULT);


        if (emptyValues($username, $email, $age, $pass, $passConfirm, $checkbox) != false){
            header("location: " . signup . "?error=empty");
            exit();
        }

        if (passwordsDoNotMatch($pass, $passConfirm) != false){
            header("location: " . signup . "?error=nomatch");
            exit();
        }
        if ($passLength <= 7){
            header("location: " . signup . "?error=weak");
            exit();
        }

            if (!empty(userExist($username))){
                header("location: " . signup . "?error=exist");
                exit();
            }

        createUser($username, $email, $age, $encrypt);
 
} else header("location: " . home);