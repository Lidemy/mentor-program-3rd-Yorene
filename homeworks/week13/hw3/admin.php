<?php
session_start();

require_once('conn.php');

if (!isset($_SESSION['valid_user'])) {
  header("Location: ./login.php");
}

// if (!isset($_COOKIE['member_id'])) {
//   header("Location: ./login.php");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Review Comments</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css?v=1.1">
</head>

<body>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
      <li class='breadcrumb-item'><a href='./logout.php'>Logout</a></li>
    </ol>
  </nav>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Review Comments</h1>
    </div>
  </div>

  <div class='container'>

    <div class='comments'>

      <div class="card mb-3">
        <div class="card-header">
          <span>Nickname</span>
          <span class="text-right text-muted"> 🕛 2019-07-11 11:09:11<span>
        </div>
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <!-- <a class="btn btn-outline-primary" href='update.php?id=$row[id]'>Update/Edit</a> -->
          <!-- <a class="btn btn-outline-primary" href='delete.php?id=$row[id]'>Delete/Remove</a> -->
          <button class='btn btn-outline-primary' type='button' name='update'>Update/Edit</button>
          <button class='btn btn-outline-primary' type='button' name='delete'>Delete/Remove</button>
        </div>
      </div>

      <?php
      // // 取得 userID
      // $certificate_id = $_COOKIE['member_id'];
      // $certificate_sql = "SELECT user_id FROM yorene_users_certificate WHERE certificate_id = '$certificate_id' ";

      // $certificate_result = $conn->query($certificate_sql);
      // $certificate_resultCheck = $certificate_result->num_rows;

      // if ($certificate_result == true && $certificate_resultCheck > 0) {
      //   $cRow = $certificate_result->fetch_assoc();
      //   $id = $cRow['user_id'];
      //   // userID
      // }

      $userId = $_SESSION['valid_user'];

      $sql = "SELECT C.content, C.created_at, C.id, U.nickname FROM yorene_comments as C 
      LEFT JOIN yorene_users as U ON C.user_id = U.id 
      WHERE C.user_id = $userId 
      ORDER BY C.created_at DESC ";

      $result = $conn->query($sql);
      $resultCheck = $result->num_rows;
      if ($result && $resultCheck > 0) {
        while ($row = $result->fetch_assoc()) {
          $content = $row['content'];
          $textContent = htmlspecialchars($content, ENT_QUOTES, 'utf-8');

          // echo "<div class='comment'>";
          // echo  "<h2>" . $row['nickname'] . "</h2>";
          // echo  "<h3 class='comment__created_time'>" . $row['created_at'] . "</h3>";
          // echo  "<p class='comment__content'>" . $textContent . "</p>";
          // // 使用 a 連結外加網址的參數！
          // echo  " <a href='update.php?id=$row[id]'>Update/Edit</a>";
          // echo  " <a href='delete.php?id=$row[id]'>Delete/Remove</a>";
          // echo "</div>";

          // bootstrap
          echo "<div class='card mb-3' commentId=$row[id]>";
          echo "  <div class='card-header'>";
          echo "    <span>" . $row['nickname'] . "</span>";
          echo "    <span class='text-right text-muted'> 🕛 " . $row['created_at'] . "</span>";
          echo "  </div>";
          echo "  <div class='card-body'>";
          echo "    <p class='card-text'>" . $textContent . "</p>";
          // echo "    <a class='btn btn-outline-primary' href='update.php?id=$row[id]'>Update/Edit</a>";
          // echo "    <a class='btn btn-outline-primary' href='delete.php?id=$row[id]'>Delete/Remove</a>";
          echo "    <button class='btn btn-outline-primary' type='button' name='update' commentId=$row[id]>Update/Edit</button>";
          echo "    <button class='btn btn-outline-primary' type='button' name='delete' commentId=$row[id]>Delete/Remove</button>";
          echo "  </div> ";
          echo "</div> ";
        }
      }
      ?>
    </div>
  </div>

  <script src='https://code.jquery.com/jquery-3.4.1.js'></script>
  <script src='./admin.js'></script>
</body>

</html>