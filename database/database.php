<?php

$server = "localhost";
$user = "root";
$db_password = "";
$db_name = "users";

$conn = mysqli_connect($server, $user, $db_password, $db_name);

if (!$conn){
    echo "Failed to connect to MySQL" . mysqli_connect_error();
    exit();
}
