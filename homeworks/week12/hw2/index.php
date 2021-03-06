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
  <link rel="stylesheet" href="./style.css?v=1.1">
  <!-- <link rel="stylesheet" href='./style2.css'> -->

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
      // First Layer
      $sql = "SELECT C.id, C.content, C.created_at, C.user_id, U.nickname FROM yorene_comments as C 
      LEFT JOIN yorene_users as U ON C.user_id = U.id 
      ORDER BY C.created_at DESC LIMIT 20 ";

      $result = $conn->query($sql);
      $resultCheck = $result->num_rows;
      if ($result && $resultCheck > 0) {
        // echo $resultCheck;
        while ($row = $result->fetch_assoc()) {
          $commentId = $row['id'];
          $originPoster = $row['user_id']; 
          $content = $row['content'];
          $textContent = htmlspecialchars($content, ENT_QUOTES, 'utf-8');
          
          echo "<div class='comment'>";

          echo  "<h2>" . $row['nickname'] . "</h2>";
          echo  "<h3 class='comment__created_time'>" . $row['created_at'] . "</h3>";
          echo  "<p class='comment__content'>" . $textContent . "</p>";

          // Second Layer comments => children comments
          // $childSql = " SELECT * FROM yorene_comments_children WHERE comment_id = '$commentId' ";
          $childSql = " SELECT CC.content, CC.created_at, CC.user_id, U.nickname FROM yorene_comments_children as CC 
          LEFT JOIN yorene_users as U ON CC.user_id = U.id 
          WHERE CC.comment_id = $commentId 
          ORDER BY CC.created_at DESC ";

          $childResult = $conn->query($childSql);
        // if (!$childResult) {
        //   trigger_error('Invalid query: ' . $conn->error);
        // } else {
        //   echo "success";
        //   // echo $childSql;
        // } 

          $childResultCheck = $childResult->num_rows;
          if ($childResult && $childResultCheck > 0) {
            while ($childRow = $childResult->fetch_assoc()) {

              if ($childRow['user_id'] === $originPoster) {
                echo "<div class='comment__children original_poster'> ";
              } else {
                echo "<div class='comment__children'>";
              }

              echo " <h2>" . $childRow['nickname'] . "</h2>";
              echo " <h3 class='comment__created_time'>" . $childRow['created_at'] . "</h3> ";
              echo " <p class='comment__content'>" . $childRow['content'] . "</p> ";
              echo "</div>";
            }
          };


          echo "</div>";

          echo "<a href='./add_child.php?id=$commentId'>Reply/Add Comments</a> ";
        }
      }

      // $childSql = " SELECT * FROM yorene_comments_children ";
      // $childResult = $conn->query($childSql);
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