<?php

if (isset($_POST["logout"])){
    echo "yes";
    session_unset();
    session_destroy();
    header("location: " . home);
}
?>

<div class = "parent">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark nvb">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand font-weight-bold logo" href="./homepage.php">Authentication</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./homepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./userinformation.php">User information</a>
        </li>
  
      </ul>
            <form class = "nav-item" action="<?php echo $_SERVER["PHP_SELF"];?>" method = "POST">
                <button type="submit" name = "logout" class = "btn btn-outline-light btn-sm">Log out</button>
            </form>
    </div>
  </div>
</nav>
</div>