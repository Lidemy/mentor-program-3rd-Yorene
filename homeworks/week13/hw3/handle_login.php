<?php
session_start();
require_once('conn.php');

$username = $_POST["username"];
$password = $_POST["password"];

if (empty($username) || empty($password)) {
  die("Please check! Both fields are required!");
}

// week12
$stmt = $conn->prepare("SELECT id, password FROM yorene_users WHERE username = ? ");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();

  if (password_verify($password, $row['password'])) {

    // week13
    $_SESSION['valid_user'] = $row['id'];

    header('Location: ./index.php');
  } else {
    echo "Wrong password";
  }
} else {
  echo "Wrong username";
}
