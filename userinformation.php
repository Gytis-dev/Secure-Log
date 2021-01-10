<?php
    require("./includes/header.php");
    require("./database/database.php");
    require("./includes/routes.php");
    session_start();

    if (isset($_SESSION["loggedUser"]));
    else header("location: " . home);

        // fetch from MySql
        $sql = "SELECT * FROM user WHERE id = $_SESSION[userId]";
        $result = mysqli_query($conn, $sql);
        $items = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        require("./includes/navbar.php");

if (isset($_GET["message"])){
        if ($_GET["message"] === "empty") echo "<div class = \"alert alert-danger alertas text-center\">It is not possible to update information with empty details !</div>";
        if ($_GET["message"] === "1") echo "<div class = \"alert alert-success alertas text-center\">Information succesfully updated! In order to see the changes please log out and sign in with new credentials</div>";
        if ($_GET["message"] === "same") echo "<div class = \"alert alert-danger alertas text-center\">Could not update information as nothing has been changed</div>"; 
        if ($_GET["message"] === "passerror") echo "<div class = \"alert alert-danger alertas text-center\">Incorrect old password and / or new password was not filled in, please try again</div>"; 
        if ($_GET["message"] === "confirmed") echo "<div class = \"alert alert-success alertas text-center\">Password changed!</div>"; 
}
?>

<div class = "container card-wrap">
    <div class="card">
    <div class="card-header">Edit profile</div>
         <div class="card-body">
                    <form action="./includes/update.php" method = "POST" class = "container">
                            <div class = "form-group change">
                                    <label class = "lbl">Username information</label>
                                    <input class = "form-control form-control-sm" type="text" value = "<?php echo $items["name"]?>" name = "usernameValue"/>
                            </div>
                            <div class = "form-group change">
                                    <label class = "lbl">Email</label>
                                    <input class = "form-control form-control-sm" type="text" value = "<?php echo $items["email"]?>" name = "emailValue"/>
                            </div>
                            <div class = "form-group change">
                                    <label class = "lbl">Age</label>
                                    <input class = "form-control form-control-sm" type="number" value = "<?php echo $items["age"]?>" name = "ageValue"/>
                            </div>
                                    <button class = "btn btn-success btn-sm backbtn" name = "changeDetails">Save details</button>
                                    <a class = "btn btn-outline-secondary btn-sm backbtn" href = <?php echo homepage;?>>Go back</a>
                 </form>    
        </div>
    </div>
</div>

<div class = "container card-wrap wrap2">
    <div class="card">
    <div class="card-header">Password change</div>
         <div class="card-body">

                    <form action="./includes/passUpdate.php" method = "POST" class = "container">
                            <div class = "form-group change">
                                    <label class = "lbl">Old password</label>
                                    <input class = "form-control form-control-sm" type="password" name = "oldpass" placeholder = "Old password"/>
                            </div>
                            <div class = "form-group change">
                                    <label class = "lbl">New password</label>
                                    <input class = "form-control form-control-sm" type="password" name = "newpass" placeholder = "Password - at least 8 characters long"/>
                            </div>
                            <div class = "form-group change">
                                    <label class = "lbl">Confirm new password</label>
                                    <input class = "form-control form-control-sm" type="password" name = "confpass" placeholder = "Confirm new password"/>
                            </div>
                                    <button class = "btn btn-success btn-sm backbtn" name = "changeDetails">Save new password</button>
                                    <a class = "btn btn-outline-secondary btn-sm backbtn" href = <?php echo homepage;?>>Go back</a>
                 </form>    
        </div>
    </div>
</div>

<?php require("./includes/footer.php"); ?>