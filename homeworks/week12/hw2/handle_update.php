<?php
require_once('conn.php');

// 改掉才交作業
$content = $_POST["content"];
// Week12
$textContent = htmlspecialchars($content, ENT_QUOTES, 'utf-8');
$user_id = $_POST["user_id"];
$comment_id = $_POST["comment_id"];

if (empty($content)) {
  die("Please check!");
}

// $sql = "UPDATE yorene_comments SET content = '$textContent' WHERE id = '$comment_id' ";
// $result = $conn->query($sql);

// Week 12
// prepare and bind
$stmtUpdate = $conn->prepare("UPDATE yorene_comments SET content = ? WHERE id = ? ");
$stmtUpdate->bind_param("ss", $textContent, $comment_id);
// execute
$stmtUpdate->execute();
$result = $stmtUpdate->get_result();

if ($result) {
  header("Location: ./admin.php");
} else {
  // echo "Failed, " . $conn->error . "<br>";
  // trigger_error($mysqli->error, E_USER_ERROR);
  trigger_error('(Invalid query): ' . $conn->error);
  trigger_error($stmtUpdate->error, E_USER_ERROR);
  echo $stmtUpdate->errno;
}
