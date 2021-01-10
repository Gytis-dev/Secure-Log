<?php

require("routes.php");

function emptyValues($user, $eml, $age, $pass, $confirm, $check){

     if (empty($check)) return true;

     if (empty($user) || empty($eml) || empty($age) || empty($pass) || empty($confirm)) return true;
}

function passwordsDoNotMatch($password, $confirmedPassword){
    if ($password != $confirmedPassword) return true;
}

function createUser($useris, $eml, $age, $pass){
    require("../database/database.php");
    $date = "20" . date("y") . "-" . date("m") . "-" . date("d");

    $sql = "INSERT INTO user (name, email, age, date, password) VALUES ('$useris', '$eml', '$age', '$date', '$pass');";

    if (mysqli_query($conn, $sql)){
        echo "Record created!";
        header("location: " . home . "?success=1");
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
function userExist($useris){
    require("../database/database.php");
    $status = false;
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);


    foreach($items as $key => $value){

        if ($value["name"] === $useris) $status = true;
    }

    mysqli_free_result($result);
    mysqli_close($conn);

    return $status;
}



function verification($useris, $pass){
    require("../database/database.php");
    $status = false;
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);



    foreach($items as $key => $value){

        if ($value["name"] === $useris && !empty(password_verify($pass, $value["password"]))){
            $status = true;
            session_start();
            $_SESSION["loggedUser"] = $value["name"];
            $_SESSION["userId"] = $value["id"];
            $_SESSION["eml"] = $value["email"];
            $_SESSION["age"] = $value["age"];
            $_SESSION["pass"] = $value["password"];
        }
    }
  

    if ($status){
         header("location: " . homepage . "?user=" . $_SESSION["loggedUser"]);
    }
    else {
        header("location: " . home . "?error=incorrect");
        exit();
    }

    mysqli_free_result($result);
    mysqli_close($conn);

    return $status;
}

function updateCheck($changeName, $changeEmail, $changeAge){
    if (empty($changeName) || empty($changeEmail) || empty($changeAge))
    return true;
}

function updateMysql($changeName, $changeEmail, $changeAge, $currentUser, $new){
    require("../database/database.php");

    $sql = "UPDATE user SET name = '$changeName', `email` = '$changeEmail', `age` = '$changeAge' WHERE `user`.`id` =  $_SESSION[userId];";

    if (mysqli_query($conn, $sql)){
        echo "Record created!";
        header("location: " . userinfo . "?message=1");
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
 

 
}





