<?php
require_once('conn.php');

$username = $_POST["username"];
$password = $_POST["password"];

if (empty($username) || empty($password)) {
  die("Please check! Both fields are required!");
}

$sql = "SELECT id, password FROM yorene_users WHERE username = '$username';";

$result = $conn->query($sql);
$resultCheck = $result->num_rows;

if ($result && $resultCheck > 0) {
  $row = $result->fetch_assoc();

  // 若正確: Week9: $password === $row['password']
  if (password_verify($password, $row['password'])) {
    // rand: 亂數產生一個通行證 ID
    $certify_id = mt_rand();
    // INSERT: 在資料庫裡面記下通行證 ID 與會員 ID 的對應關係
    $certify_sql = "INSERT INTO yorene_users_certificate(certificate_id, user_id) VALUES ('$certify_id', '$row[id]')";
    $certify_result = $conn->query($certify_sql);

    if ($certify_result) {
      // cookie: 把通行證 ID 設置到 Cookie
      $cookie_value_user_id = $certify_id;
      setcookie("member_id", "$cookie_value_user_id", time() + 60 * 60);
    }
    
    header('Location: ./index.php');
  } else {
    echo "Wrong password";
  }
} else {
  echo "Wrong username";
}
