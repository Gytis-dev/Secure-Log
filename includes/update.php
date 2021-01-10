<?php

require("../database/database.php");
require("functions.php");
require("routes.php");
session_start();

$changeName = $_POST["usernameValue"];
$changeEmail = $_POST["emailValue"];
$changeAge = $_POST["ageValue"];

$current =  $_SESSION["userId"];
$currentUsername = $_SESSION["loggedUser"];
$currentEmail = $_SESSION["eml"];
$currentAge = $_SESSION["age"];
$oldpassMysql = $_SESSION["pass"];

if ($changeName === $currentUsername && $changeEmail === $currentEmail && $changeAge === $currentAge){

    header("location: " . userinfo . "?message=same");
    exit();
}
    else if (updateCheck($changeName, $changeEmail, $changeAge) != false){
        header("location: " . userinfo . "?message=empty");
        exit();
    }
   else {
    updateMysql($changeName, $changeEmail, $changeAge, $current, $new);
   }













