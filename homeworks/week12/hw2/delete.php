<?php
require_once('conn.php');

$id = $_GET['id'];

// week9
// $sql = "DELETE FROM yorene_comments WHERE id = $id";
// $result = $conn->query($sql);
// if ($result) {
//   header("Location: ./admin.php");
// } else {
//   echo "Failed: " . $conn->error;
// }

// week12
$sql = "DELETE FROM yorene_comments WHERE id = ? ";
$statement = $conn->prepare($sql);
$statement->bind_param("i", $id);
$statement->execute();
header("Location: ./admin.php");
