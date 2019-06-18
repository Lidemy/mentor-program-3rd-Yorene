<?php
require_once('conn.php');

$username = $_POST["username"];
$password = $_POST["password"];
$nickname = $_POST["nickname"];

if (empty($nickname) || empty($username) || empty($password)) {
  die("Please check! All fields are required!");
}

$sql = "INSERT INTO yorene_users(username, password, nickname) VALUES ('$username', '$password', '$nickname')";

$result = $conn->query($sql);
// $resultCheck = $result->num_rows;

if ($result) {
  header("Location: ./login.php");
} else {
  echo "Failed, " . $conn->error . "<br>";
  // echo "$sql";
}
