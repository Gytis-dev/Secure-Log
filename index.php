
<?php require("./includes/header.php"); ?>


<div class = "center">
<?php

if (isset($_GET["success"])){
    if ($_GET["success"] === "1") echo "<div class = \"alert alert-success alertas text-center\">Well done! User has been created. Please log in</div>"; 
}
      if (isset($_GET["error"])){
        if ($_GET["error"] === "incorrect") echo "<div class = \"alert alert-danger alertas text-center\">Incorrect username and / or password</div>"; 
      }
?>
<form action = "./includes/loginas.php" method = "POST" class = "form">
  <?php require("./images/pic.svg"); ?>
  <p class = "lead text-center lead">Please log in</p>

  <div class="form-group input">
    <input type="text" class="form-control" placeholder="Enter username" name = "username">
  </div>

  <div class="form-group input">
    <input type="password" class="form-control" placeholder="Enter password" name = "password">
  </div>

  <div class = "buttons">
    <button type="submit" class="btn btn-primary" name = "login">Submit</button>
    <a class="btn btn-outline-secondary" href = "signup.php">Sign up</a>
  </div>

</form>
</div>
<?php require("./includes/footer.php"); ?>








