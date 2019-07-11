<?php
require_once('conn.php');

$content = $_POST["content"];
// 存入資料庫是看得懂的，不用轉換；但讀取出來就要轉換！
// $textContent = htmlspecialchars($content, ENT_QUOTES, 'utf-8');
// 改掉才交作業 ok
// $user_id = $_POST["user_id"];
// 直接從 cookie 拿 id
$certificate_id = $_COOKIE['member_id'];
$certificate_sql = "SELECT user_id FROM yorene_users_certificate WHERE certificate_id = '$certificate_id' ";
$certificate_result = $conn->query($certificate_sql);
$certificate_resultCheck = $certificate_result->num_rows;
if ($certificate_result == true && $certificate_resultCheck > 0) {
  $cRow = $certificate_result->fetch_assoc();
  $user_id = $cRow['user_id'];
}

if (empty($content)) {
  die("Please check!");
}

// $sql = "INSERT INTO yorene_comments(content, user_id) VALUES ('$content', '$user_id')";

// week12
$sql = "INSERT INTO yorene_comments(content, user_id) VALUES ( ?, ? )";
$statement = $conn->prepare($sql);
$statement->bind_param("si", $content, $user_id);
$statement->execute();
// $result = $stmt->get_result();
// echo $statement;
header("Location: ./index.php");

// $result = $statement->get_result();
// $result = $conn->query($sql);

// week9
// if ($result) {
//   header("Location: ./index.php");
//   echo "success";
// } else {
//   echo "Failed, " . $conn->error . "<br>";
//   echo "Failed, " . $conn->connect_error . "<br>";
// }
