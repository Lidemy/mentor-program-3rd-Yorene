<?php
require_once('conn.php');
require_once('response.php');

header('Content-type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

$id = $_GET['id'];

if ($method == 'PATCH') {
  // $sql = 'SELECT done FROM yorene_todo WHERE id = ? ';
  $sql = 'UPDATE yorene_todo SET done = !done WHERE id = ? ';
  $statement = $conn->prepare($sql);
  $statement->bind_param('i', $id);
  $statement->execute();
}

select($conn);
