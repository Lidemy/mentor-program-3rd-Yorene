<?php
require_once('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Review Comments</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  
  <?php
  require_once('header_nav.php');
  ?>

  <div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
      <h1 class="display-4">Edit Comments</h1>
    </div>
  </div>

  <div class='container'>

    <form method='POST' action="./handle_update.php">

      <?php
      $commentId = $_GET['id'];

      // week12: 找同一篇 commentId 的機制。
      $sql = "SELECT C.id, C.content, C.user_id, U.nickname FROM yorene_comments as C 
      LEFT JOIN yorene_users as U ON C.user_id = U.id 
      WHERE C.id = ? ";
      $statement = $conn->prepare($sql);
      $statement->bind_param("i", $commentId);
      $statement->execute();
      $result = $statement->get_result();

      $resultCheck = $result->num_rows;
      if ($result && $resultCheck > 0) {

        $row = $result->fetch_assoc();
        $nickname = $row['nickname'];
        $content = $row['content'];
        $textContent = htmlspecialchars($content, ENT_QUOTES, 'utf-8');

        $userId = $row['user_id'];
        $commentId = $row['id'];

        echo "<div class='p-2'>Nickname: $nickname </div>";
        echo "<div class='p-2'>Comment: <textarea class='form-control' name='content' rows='5'> $textContent </textarea></div>";
        // 完整為一筆資料寫入資料庫
        echo "<div><input type='hidden' name='comment_id' value='$commentId'></div>";
      }
      ?>

      <div class="p-2 text-center"><input type="submit" class="btn btn-primary"></div>
    </form>
  </div>
</body>

</html>