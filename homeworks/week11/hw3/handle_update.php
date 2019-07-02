<?php
require_once('conn.php');

$content = $_POST["content"];
$user_id = $_POST["user_id"];
$comment_id = $_POST["comment_id"];

if (empty($content)) {
  die("Please check!");
}

$sql = "UPDATE yorene_comments SET content = '$content' WHERE id = '$comment_id' ";

$result = $conn->query($sql);

if ($result) {
  header("Location: ./admin.php");
} else {
  echo "Failed, " . $conn->error . "<br>";
}
