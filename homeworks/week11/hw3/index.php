<?php
require_once('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Comments Board</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class='container'>
    <h1>Comments Board</h1>
    <p>本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</p>

    <?php 
    if (!isset($_COOKIE['member_id'])) {
      echo "<a href='./add_user.php'>Sign Up</a> ";
      echo "<a href='./login.php'>Login</a> ";
    } else {
      echo "<a href='./logout.php'>Logout</a> ";
      // echo "<a href='./admin.php'>Review Comments</a> ";
    }
    ?>

    <a href="./add.php">Add Comments</a>
    <a href="./admin.php">Review Comments</a>

    <div class='comments'>

    <?php
      $sql = "SELECT C.content, C.created_at, U.nickname FROM yorene_comments as C 
      LEFT JOIN yorene_users as U ON C.user_id = U.id 
      ORDER BY C.created_at DESC LIMIT 20 ";

      $result = $conn->query($sql);
      $resultCheck = $result->num_rows;
      if ($result && $resultCheck > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='comment'>";
          echo  "<h2>" . $row['nickname'] . "</h2>";
          echo  "<h3 class='comment__created_time'>" . $row['created_at'] . "</h3>";
          echo  "<p class='comment__content'>" . $row['content'] . "</p>";
          echo "</div>";
        }
      }
      // echo $resultCheck;
    ?>
    
    </div>

    <?php
      $pageSql = "SELECT id FROM yorene_comments ";
      $pageResult = $conn->query($pageSql);
      $PageResultCheck = $pageResult->num_rows;
      if ($pageResult == true && $PageResultCheck > 0) {
        // echo $PageResultCheck;
        $pageNumber = ceil($PageResultCheck / 20);
        // echo $pageNumber;
        for ($i = 1; $i <= $pageNumber; $i += 1) {
          echo "<a href='./page.php?id=$i'>Page $i</a> ";
        }
      }
    ?>

  </div>
</body>
</html>