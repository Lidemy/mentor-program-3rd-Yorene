<?php
require_once('valid_user.php');
require_once('conn.php');

$commentId = $_POST['comment_id'];
$content = $_POST["content"];
// Week12
$textContent = htmlspecialchars($content, ENT_QUOTES, 'utf-8');

if (empty($content)) {
  die("Please check!");
}

$sql = "INSERT INTO yorene_comments_children(content, user_id, comment_id) VALUES (?, ?, ?)";
$statement = $conn->prepare($sql);
$statement->bind_param("sii", $textContent, $userId, $commentId);
$statement->execute();
header("Location: ./index.php");
