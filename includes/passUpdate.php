<?php

require("../database/database.php");
require("functions.php");
require("routes.php");
session_start();

if (isset($_SESSION["loggedUser"]));
    else header("location: " . home);


     $old = $_POST["oldpass"];
     $new = $_POST["newpass"];
     $conf = $_POST["confpass"];
     $uid = $_SESSION["userId"];
     $passLength = strlen($new);

      // fetch from MySql
      $sql = "SELECT * FROM user WHERE id = $_SESSION[userId]";
      $result = mysqli_query($conn, $sql);
      $items = mysqli_fetch_assoc($result);
      mysqli_close($conn);


    if (!empty(password_verify($old, $items["password"]) && !empty($new)) && !empty($conf)){
            require("../database/database.php");

            if ($new === $conf && $passLength > 7){
    
                $encrypted = password_hash($new, PASSWORD_DEFAULT);
        
                $sql = "UPDATE `user` SET `password` = '$encrypted' WHERE `user`.`id` =  '$uid'";
    
                if (mysqli_query($conn, $sql)){
                    echo "Record created!";
                    header("location: " . userinfo . "?message=confirmed");
                 }
                 else {
                     echo "Error: " . mysqli_error($conn);
                 }
                 mysqli_close($conn);
            }
            else {
                header("location: " . userinfo . "?message=passerror");
            }

        }
        else {
            header("location: " . userinfo . "?message=passerror");
        }
      
    
   