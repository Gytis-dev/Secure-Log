<?php

require("routes.php");
require("functions.php");

if (isset($_POST["login"])){

    $useris = $_POST["username"];
    $pass = $_POST["password"];


    verification($useris, $pass);
        
    
   
}

else {
    header("location: " . home);
}
