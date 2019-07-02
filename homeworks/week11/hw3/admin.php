<?php
require_once('conn.php');

if (!isset($_COOKIE['member_id'])) {
  header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Review Comments</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class='container'>
    <h1>Review Comments</h1>
    <a href='./index.php'>Comments Board</a>

    <div class='comments'>

    <?php
      $certificate_id = $_COOKIE['member_id'];

      $certificate_sql = "SELECT user_id FROM yorene_users_certificate WHERE certificate_id = '$certificate_id' ";

      $certificate_result = $conn->query($certificate_sql);
      $certificate_resultCheck = $certificate_result->num_rows;

      if ($certificate_result == true && $certificate_resultCheck > 0) {
        $cRow = $certificate_result->fetch_assoc();
        $id = $cRow['user_id'];
        // userID
      }

      $sql = "SELECT C.content, C.created_at, C.id, U.nickname FROM yorene_comments as C 
      LEFT JOIN yorene_users as U ON C.user_id = U.id 
      WHERE C.user_id = $id 
      ORDER BY C.created_at DESC ";
      // LIMIT 20

      $result = $conn->query($sql);
      $resultCheck = $result->num_rows;
      if ($result && $resultCheck > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='comment'>";
          echo  "<h2>" . $row['nickname'] . "</h2>";
          echo  "<h3 class='comment__created_time'>" . $row['created_at'] . "</h3>";
          echo  "<p class='comment__content'>" . $row['content'] . "</p>";
          // 使用 a 連結外加網址的參數！
          echo  " <a href='update.php?id=$row[id]'>Update/Edit</a>";
          echo  " <a href='delete.php?id=$row[id]'>Delete/Remove</a>";
          echo "</div>";
        }
      }
    ?>
    </div>
  </div>
</body>
</html>