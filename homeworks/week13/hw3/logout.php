<?php
session_start();
unset($_SESSION['valid_user']);
session_destroy();
// header("Location: ./index.php");

if (empty($_SESSION['valid_user'])) {
  header("Location: ./index.php");
}

// week9
// setcookie("member_id", "", time()-1200);
