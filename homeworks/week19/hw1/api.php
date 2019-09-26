<?php
require_once('conn.php');
require_once('response.php');

header('Content-type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':
    select($conn);
    exit;
  case 'POST':
    $content = $_POST['content'];
    if (isset($_GET['id'])) {
      // PATCH 更新
      $id = $_GET['id'];
      // if (empty($content)) {
      // }

      $sql = 'UPDATE yorene_todo SET content = ? WHERE id = ? ';
      $statement = $conn->prepare($sql);
      $statement->bind_param('si', $content, $id);
      $statement->execute();

      select($conn);

    } else {
      // POST 新增

      // if (empty($content)) {
      //   $arr = array('')
      // }

      $sql = 'INSERT INTO yorene_todo(content) VALUES ( ? ) ';
      $statement = $conn->prepare($sql);
      $statement->bind_param('s', $content);
      $statement->execute();

      select($conn);
    }

    exit;
  case 'DELETE':
    $id = $_GET['id'];
    // echo $id;

    $sql = 'DELETE FROM yorene_todo WHERE id = ? ';
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $id);
    $statement->execute();

    select($conn);
    exit;
  // case 'PATCH':
  //   // OK
  //   $id = $_GET['id'];

  //   exit;
}
