<?php
require_once('conn.php');

$id = $_GET['id'];

$sql = "DELETE FROM yorene_comments WHERE id = $id";
$result = $conn->query($sql);
if ($result) {
  header("Location: ./admin.php");
} else {
  echo "Failed: " . $conn->error;
}