<?php
require_once('conn.php');

if (!isset($_COOKIE['member_id'])) {
  header("Location: ./login.php");
}

$commentId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Comments</title>
  <link rel="stylesheet" type="text/css" href="./style.css?v=1.1">
</head>
<body>
  <div class='container'>
    <h1>Add Comments</h1>
    <a href="./logout.php">Logout</a>
    <a href="./index.php">Comments Board</a>

    <div class='comments'>

      <form method='POST' action="./handle_add_child.php">
      
      <?php
      if (isset($_COOKIE['member_id'])) {

        // Week11: 通行證 ID => 取得 user id 
        $certificate_id = $_COOKIE['member_id'];
        $certificate_sql = "SELECT user_id FROM yorene_users_certificate WHERE certificate_id = '$certificate_id' ";
        $certificate_result = $conn->query($certificate_sql);
        $certificate_resultCheck = $certificate_result->num_rows;
        if ($certificate_result == true && $certificate_resultCheck > 0) {
          $cRow = $certificate_result->fetch_assoc();
          $userId = $cRow['user_id'];
        }

        // Week9: user id => 取得 nickname
        $sql = "SELECT nickname FROM yorene_users WHERE id = '$userId'";
        $result = $conn->query($sql);
        $resultCheck = $result->num_rows;
        if ($result && $resultCheck > 0) {
          $row = $result->fetch_assoc();
          $nickname = $row['nickname'];

          echo "<div>Nickname: $nickname </div>";
          echo "<div>Comment: <textarea name='content' cols='80' rows='10'></textarea></div>";
          // 
          echo "<div><input type='hidden' name='comment_id' value='$commentId'></div>";
        }
      }
        ?>

        <input type="submit">
      </form>
      
    </div>
  </div>
</body>
</html>
