<?php
require("./includes/header.php");
require("./includes/routes.php");
require("./database/database.php");
session_start();

if (isset($_SESSION["loggedUser"]));
    else header("location: " . home);
    require("./includes/navbar.php");

// fetch user information
$sql = "SELECT * FROM user WHERE id = $_SESSION[userId]";
$result = mysqli_query($conn, $sql);
$items = mysqli_fetch_assoc($result);
mysqli_close($conn);
?>


<div class = "background">
<div class = "container card-wrap wrap1">
    <div class="card">
    <div class="card-header">User information</div>
        
         <div class="card-body">
                <h5 class="card-title">Hello,  <?php echo "<p class = \"name\">" . $_SESSION['loggedUser'] ."</p>";?></h5>
                <p class="card-text">Below you can find your profile information:</p>
                <small>Your unique system identification number: <?php echo $items["id"]?></small> <br>
                <small>Your username: <?php echo $items["name"]?></small> <br>
                <small>Email address: <?php echo $items["email"]?></small> <br>
                <small>Age: <?php echo $items["age"]?></small> <br>
                <small>Signed up on: <?php echo $items["date"]?></small> <br> <br>
                <p class="card-text">If you wish to make changes to your profile please click <mark>Edit profile</mark> button</p>
               <a href = <?php echo userinfo;?> class = "btn btn-outline-primary">Edit profile</a>
        </div>
    </div>
</div>


</div>



<?php require("./includes/footer.php");?>
