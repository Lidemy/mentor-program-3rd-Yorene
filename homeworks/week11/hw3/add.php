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
  <title>Add Comments</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class='container'>
    <h1>Add Comments</h1>
    <a href="./logout.php">Logout</a>
    <a href="./index.php">Comments Board</a>

    <div class='comments'>

      <form method='POST' action="./handle_add.php">
      
      <?php
      if (isset($_COOKIE['member_id'])) {

        // Week9: $id = $_COOKIE['member_id'];    == true 取得 id
        // Week11
        $certificate_id = $_COOKIE['member_id'];
        // SELECT: 檢查通行證 ID 是否有對應到的 ID
        $certificate_sql = "SELECT user_id FROM yorene_users_certificate WHERE certificate_id = '$certificate_id' ";
        $certificate_result = $conn->query($certificate_sql);
        // if (!$certificate_result) {
        //   trigger_error('Invalid query: ' . $conn->error);
        // }
        $certificate_resultCheck = $certificate_result->num_rows;
        if ($certificate_result == true && $certificate_resultCheck > 0) {
          $cRow = $certificate_result->fetch_assoc();
          $id = $cRow['user_id'];
        }

        // Week9
        $sql = "SELECT nickname FROM yorene_users WHERE id = '$id'";
        $result = $conn->query($sql);
        $resultCheck = $result->num_rows;
        if ($result && $resultCheck > 0) {
          $row = $result->fetch_assoc();
          $nickname = $row['nickname'];

          echo "<div>Nickname: $nickname </div>";
          echo "<div>Comment: <textarea name='content' cols='80' rows='10'></textarea></div>";
          // use input to send but use hidden to hide
          echo "<div><input type='hidden' name='user_id' value='$id'></div>";
        }
      }
        // echo "<div>Nickname: <input type='text' name='nickname' value='$nickname'></div>";
        ?>

        <input type="submit">
      </form>
      
    </div>
  </div>
</body>
</html>
