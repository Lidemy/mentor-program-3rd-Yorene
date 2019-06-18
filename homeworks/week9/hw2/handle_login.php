<?php
require_once('conn.php');

$username = $_POST["username"];
$password = $_POST["password"];

if (empty($username) || empty($password)) {
  die("Please check! Both fields are required!");
}

$sql = "SELECT id, password FROM yorene_users WHERE username = '$username';";
// $sql = "SELECT username, password FROM yorene_users WHERE username = 't'";

$result = $conn->query($sql);
$resultCheck = $result->num_rows;

// 此時又不能用 $result 來判斷！
if ($result && $resultCheck > 0) {
  // echo " result is true!";
  $row = $result->fetch_assoc();
  if ($password === $row['password']) {
    // cookie
    $cookie_value_user_id = $row['id'];
    setcookie("member_id", "$cookie_value_user_id", time() + 60 * 60);

    header('Location: ./index.php');
  } else {
    echo "Wrong password";
  }
} else {
  // echo "result is false!";
  echo "Wrong username";
}
