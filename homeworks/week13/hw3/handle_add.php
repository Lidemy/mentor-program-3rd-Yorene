<?php
session_start();

require_once('conn.php');

$content = $_POST["content"];

if (!isset($_SESSION['valid_user'])) {
  $arr = array('result' => 'fail');
} else {
  if (empty($content)) {
    $arr = array('result' => 'empty');
  } else {
    $user_id = $_SESSION['valid_user'];

    $sql = "INSERT INTO yorene_comments(content, user_id) VALUES ( ?, ? )";
    $statement = $conn->prepare($sql);
    $statement->bind_param("si", $content, $user_id);
    $statement->execute();

    // week13 AJAX
    $last_id = $conn->insert_id;
    $newSql = "SELECT created_at FROM yorene_comments WHERE id = $last_id ";
    $result = $conn->query($newSql);
    if ($result == true && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $createdTime = $row['created_at'];

      $arr = array('result' => 'success', 'commentId' => $last_id, 'created_at' => $createdTime);
    }
  }
}
echo json_encode($arr);
