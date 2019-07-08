<?php
require_once('conn.php');

$commentId = $_POST['comment_id'];
// echo $commentId;
$content = $_POST["content"];
// Week12
$textContent = htmlspecialchars($content, ENT_QUOTES, 'utf-8');

// 改掉才交作業
// $user_id = $_POST["user_id"];
// Week11: 通行證 ID => 取得 user id 
$certificate_id = $_COOKIE['member_id'];
$certificate_sql = "SELECT user_id FROM yorene_users_certificate WHERE certificate_id = '$certificate_id' ";
$certificate_result = $conn->query($certificate_sql);
$certificate_resultCheck = $certificate_result->num_rows;
if ($certificate_result == true && $certificate_resultCheck > 0) {
  $cRow = $certificate_result->fetch_assoc();
  $userId = $cRow['user_id'];
}

if (empty($content)) {
  die("Please check!");
}

$sql = "INSERT INTO yorene_comments_children(content, user_id, comment_id) VALUES ('$textContent', '$userId', '$commentId')";
// Because no user_id, Error Field 'user_id' doesn't have a default value
$result = $conn->query($sql);
// $resultCheck = $result->num_rows;

if ($result) {
  // 之後可能要改成 page.php
  header("Location: ./index.php");
  // echo "success!";
} else {
  echo "Failed, " . $conn->error . "<br>";
}
