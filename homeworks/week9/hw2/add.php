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
    <h1>Comments Board - Add Comments</h1>
    <a href="./logout.php">Logout</a>
    <a href="./index.php">Comments Board</a>

    <div class='comments'>

      <form method='POST' action="./handle_add.php">
      
      <?php
      if (isset($_COOKIE['member_id'])) {
        $id = $_COOKIE['member_id'];

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
