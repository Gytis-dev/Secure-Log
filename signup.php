
<?php require("./includes/header.php");
      require("./includes/routes.php");
?>

<a class = "btn btn-outline-secondary backbtn" href=<?php echo home;?>>Back</a>

<div class = "center">

<?php
 if (isset($_GET["error"])){
  if ($_GET["error"] === "empty") echo "<div class = \"alert alert-danger alertas text-center\">Please make sure that all fields are filled in</div>";
    
    if (isset($_GET["error"]))
      if ($_GET["error"] === "nomatch") echo "<div class = \"alert alert-danger alertas text-center\">Passwords do not match</div>";

        if (isset($_GET["error"]))
          if ($_GET["error"] === "weak") echo "<div class = \"alert alert-danger alertas text-center\">Password should be at least 8 characters long</div>";

              if (isset($_GET["error"]))
                if ($_GET["error"] === "exist") echo "<div class = \"alert alert-danger alertas text-center\">This username already taken</div>";
 }   
?>
<form action = "./includes/registration.php" method = "POST" class = "form">

    <p class = "lead text-center lead">Create user</p>
        <div class="form-group input">
          <input type="text" class="form-control" placeholder="Enter username" name = "username">
        </div>
        <div class="form-group input">
          <input type="email" class="form-control" placeholder="Enter email" name = "email">
        </div>
        <div class="form-group input">
          <input type="number" class="form-control" placeholder="Enter your age" name = "age">
        </div>
        <div class="form-group input">
          <input type="password" class="form-control" placeholder="Password - at least 8 characters long" name = "password">
        </div>
        <div class="form-group input">
          <input type="password" class="form-control" placeholder="Repeat password" name = "password_confirm">
        </div>
        <div class="form-check checkas">
          <input type="checkbox" class="form-check-input" name = "conditions">
          <label class="form-check-label">By clicking this checkbox, you agree to our Terms and conditions</label>
        </div>
        <div class = "buttons">
          <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
        </div>
</form>
      </div>
<?php require("./includes/footer.php"); ?>








