<?php
require_once('conn.php');
function select($conn)
{
  $sql = 'SELECT id, content, done FROM yorene_todo ';
  $result = $conn->query($sql);
  if ($result && $result->num_rows > 0) {
    $arr = array();
    while ($row = $result->fetch_assoc()) {
      // print_r($row);
      $arr[$row['id']] = $row;
    }
    // return?
    echo json_encode($arr);
  }
};