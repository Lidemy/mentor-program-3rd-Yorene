<?php
session_start();
unset($_SESSION['valid_user']);
session_destroy();

if (empty($_SESSION['valid_user'])) {
  header("Location: ./index.php");
}
