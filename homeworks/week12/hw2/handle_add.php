<?php
require_once('conn.php');

$content = $_POST["content"];
// 存入資料庫是看得懂的，不用轉換；但讀取出來就要轉換！
$textContent = htmlspecialchars($content, ENT_QUOTES, 'utf-8');
// 改掉才交作業
$user_id = $_POST["user_id"];

if (empty($content)) {
  die("Please check!");
}

$sql = "INSERT INTO yorene_comments(content, user_id) VALUES ('$textContent', '$user_id')";
// Because no user_id, Error Field 'user_id' doesn't have a default value

$result = $conn->query($sql);
// $resultCheck = $result->num_rows;

if ($result) {
  header("Location: ./index.php");
} else {
  echo "Failed, " . $conn->error . "<br>";
}
