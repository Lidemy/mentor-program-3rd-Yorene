<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="./admin.php">Review Comments</a></li>

    <?php
    if (!isset($_SESSION['valid_user'])) {
      echo "<li class='breadcrumb-item'><a href='./add_user.php'>Sign Up</a></li>";
      echo "<li class='breadcrumb-item'><a href='./login.php'>Login</a></li>";
    } else {
      echo "<li class='breadcrumb-item'><a href='./logout.php'>Logout</a></li>";
    }
    ?>

  </ol>
</nav>