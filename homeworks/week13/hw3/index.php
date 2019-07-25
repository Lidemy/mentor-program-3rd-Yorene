<?php
session_start();
require_once('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Comments Board</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="./admin.php">Review Comments</a></li>

      <?php
      if (!isset($_SESSION['valid_user'])) {
        echo "<li class='breadcrumb-item'><a href='./add_user.php'>Sign Up</a></li>";
        echo "<li class='breadcrumb-item'><a href='./login.php'>Login</a></li>";
      } else {
        echo "<li class='breadcrumb-item'><a href='./logout.php'>Logout</a></li>";
      }
      ?>

    </ol>
  </nav>

  <div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
      <h1 class="display-4">Comments Board</h1>
      <p class="lead">本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</p>
    </div>
  </div>

  <div class='container text-left'>

    <!-- Add comments -->

    <div class="card mb-3">
      <div class="card-header">

        <?php
        if (!isset($_SESSION['valid_user'])) {
          echo "<span> Login To Add Comment <span>";
        } else {
          $userId = $_SESSION['valid_user'];
          $sql = "SELECT nickname FROM yorene_users WHERE id = '$userId' ";
          $result = $conn->query($sql);
          $resultCheck = $result->num_rows;
          if ($result && $resultCheck > 0) {
            $row = $result->fetch_assoc();
            $nickname = $row['nickname'];
            $textNickname = htmlspecialchars($nickname, ENT_QUOTES, 'utf-8');

            echo "<span id='nickname'>" . $textNickname . "<span>";
          }
        }
        ?>

      </div>
      <textarea class="form-control card-body" name="content" aria-label="With textarea" rows='5'></textarea>
      <input type="hidden" name="json" value="true">
      <div class="text-right">
        <button class='btn btn-secondary btn-block add' type="button"> Add Comment </button>
      </div>
    </div>

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

          // Bootstrap
          echo "<div class='card mb-3'>";
          echo "  <div class='card-header'>";
          echo "    <span>" . $row['nickname'] . "</span>";
          echo "    <span class='text-right text-muted'> 🕛 " . $row['created_at'] . "</span>";
          echo "  </div>";
          echo "  <div class='card-body'>";
          echo "    <p class='card-text'>" . $textContent . "</p>";
          echo "  </div> ";
          echo "  <div class='card-footer text-right'>";
          echo "    <a class='btn btn-outline-primary' href='./add_child.php?id=$commentId'>Reply Comment</a>";
          echo "  </div>";
          // echo "</div> ";
          echo "<div class='container p-0'>";
          // echo "</div> "

          // Second Layer comments => children comments
          $childSql = " SELECT CC.content, CC.created_at, CC.user_id, U.nickname FROM yorene_comments_children as CC 
          LEFT JOIN yorene_users as U ON CC.user_id = U.id 
          WHERE CC.comment_id = $commentId 
          ORDER BY CC.created_at DESC ";

          $childResult = $conn->query($childSql);

          $childResultCheck = $childResult->num_rows;
          if ($childResult && $childResultCheck > 0) {
            while ($childRow = $childResult->fetch_assoc()) {

              if ($childRow['user_id'] === $originPoster) {
                echo "<div class='card m-3 text-white bg-dark comment-children'>";
              } else {
                echo "<div class='card m-3 comment-children'>";
              }

              // echo "<div class='card mb-3'>";
              echo "  <div class='card-header'>";
              echo "    <span>" . $childRow['nickname'] . "</span>";
              echo "    <span class='text-right text-muted'> 🕛 " . $childRow['created_at'] . "</span>";
              echo "  </div>";
              echo "  <div class='card-body'>";
              echo "    <p class='card-text'>" . $childRow['content'] . "</p>";
              echo "  </div> ";
              echo " </div> ";
            }
          };

          echo " </div> ";
          echo "</div> ";
        }
      }
      ?>

    </div>

    <?php
    require_once('footer.php');
    ?>

  </div>

  <script src='https://code.jquery.com/jquery-3.4.1.js'></script>
  <script src='./index.js'></script>
</body>

</html>