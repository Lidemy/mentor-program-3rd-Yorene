<?php
require_once('conn.php');

$username = $_POST["username"];
$password = $_POST["password"];
$nickname = $_POST["nickname"];
// week 11：
$hashPassword = password_hash("$password", PASSWORD_BCRYPT);

if (empty($nickname) || empty($username) || empty($password)) {
  die("Please check! All fields are required!");
}

$sql = "INSERT INTO yorene_users(username, password, nickname) VALUES ('$username', '$hashPassword', '$nickname')";

$result = $conn->query($sql);

if ($result) {
  header("Location: ./login.php");
} else {
  echo "Failed, " . $conn->error . "<br>";
  // echo "$sql";
}
