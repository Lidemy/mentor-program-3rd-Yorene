<?php

session_start();
if (!isset($_SESSION['valid_user'])) {
  header("Location: ./login.php");
}

$userId = $_SESSION['valid_user'];