<?php
require_once('conn.php');

$content = $_POST["content"];
$comment_id = $_POST["comment_id"];

if (empty($content)) {
  die("Please check!");
}

// Week 12
$stmtUpdate = $conn->prepare("UPDATE yorene_comments SET content = ? WHERE id = ? ");
$stmtUpdate->bind_param("ss", $content, $comment_id);
$stmtUpdate->execute();
$result = $stmtUpdate->get_result();
header("Location: ./admin.php");
