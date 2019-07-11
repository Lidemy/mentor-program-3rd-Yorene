<?php
require_once('conn.php');

$content = $_POST["content"];
$comment_id = $_POST["comment_id"];

// 改掉才交作業 ok
// $user_id = $_POST["user_id"];
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

// $sql = "UPDATE yorene_comments SET content = '$content' WHERE id = '$comment_id' ";
// $result = $conn->query($sql);

// Week 12
// prepare and bind
$stmtUpdate = $conn->prepare("UPDATE yorene_comments SET content = ? WHERE id = ? ");
$stmtUpdate->bind_param("ss", $content, $comment_id);
// execute
$stmtUpdate->execute();
$result = $stmtUpdate->get_result();
header("Location: ./admin.php");

// week9
// if ($result) {
//   header("Location: ./admin.php");
// } else {
//   // echo "Failed, " . $conn->error . "<br>";
//   // trigger_error($mysqli->error, E_USER_ERROR);
//   trigger_error('(Invalid query): ' . $conn->error);
//   trigger_error($stmtUpdate->error, E_USER_ERROR);
//   echo $stmtUpdate->errno;
// }
