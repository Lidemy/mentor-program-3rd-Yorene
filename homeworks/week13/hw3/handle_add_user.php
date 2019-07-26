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

// week12
$sql = "INSERT INTO yorene_users(username, password, nickname) VALUES (?, ?, ?)";
$statement = $conn->prepare($sql);
$statement->bind_param("sss", $username, $hashPassword, $nickname);
$statement->execute();
header("Location: ./login.php");