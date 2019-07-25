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
  <!-- <link rel="stylesheet" href="./style.css?v=1.1"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- <link rel="stylesheet" href='./style2.css'> -->

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
      // if (!isset($_COOKIE['member_id'])) {
      //   echo "<a href='./add_user.php'>Sign Up</a> ";
      //   echo "<a href='./login.php'>Login</a> ";
      // } else {
      //   echo "<a href='./logout.php'>Logout</a> ";

      // // $useId
      // $certificate_id = $_COOKIE['member_id'];
      // $certificate_sql = "SELECT user_id FROM yorene_users_certificate WHERE certificate_id = '$certificate_id' ";
      // $certificate_result = $conn->query($certificate_sql);
      // $certificate_resultCheck = $certificate_result->num_rows;
      // if ($certificate_result == true && $certificate_resultCheck > 0) {
      //   $cRow = $certificate_result->fetch_assoc();
      //   $userId = $cRow['user_id'];
      // }
      // }
      ?>

    </ol>
  </nav>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Comments Board</h1>
      <p class="lead">本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</p>
    </div>
  </div>

  <div class='container text-left'>
    <!-- <h1>Comments Board</h1>
    <p>本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</p> -->

    <!-- Add comments -->
    <!-- 補：改為登入後才能看到 -->

    <div class="card mb-3">
      <div class="card-header">

        <?php
        if (!isset($_SESSION['valid_user'])) {
          // not yet test
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

            // echo "<div>Nickname: $nickname </div>";
            echo "<span id='nickname'>" . $textNickname . "<span>";
          }
        }
        ?>
        <!-- <span>ZZoee<span> -->
        <!-- <span class="text-right text-muted"> 🕛 2019-07-11 11:09:11<span> -->
      </div>
      <textarea class="form-control card-body" name="content" aria-label="With textarea" rows='5'></textarea>
      <input type="hidden" name="json" value="true">
      <div class="text-right">
        <button class='btn btn-secondary btn-block add' type="button"> Add Comment </button>
      </div>
    </div>

    <!-- for example -->
    <!-- <div class="card mb-3">
      <div class="card-header">
        <span>Nickname</span>
        <span class="text-right text-muted"> 🕛 2019-07-11 11:09:11<span>
      </div>
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div> -->

    <!-- <div class="card mb-3">
      <div class="card-header">
        <span>ZZoee<span>
            <span class="text-right text-muted"> 🕛 2019-07-11 11:09:11<span>
      </div>
      <div class="card-body">
        <p class="card-text">try</p>
      </div>
      <div class="card-footer text-right">
        <a href='./add_child.php?id=$commentId'>Reply/Add Comments</a>
      </div>

      <div class="container">

        <div class="card text-white bg-dark mt-3">
          <div class="card-header">Header</div>
          <div class="card-body">
            <h5 class="card-title">Secondary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
          <div class="card-footer text-muted">2019-07-11 11:09:11</div></div>

        <div class="card mt-3">
          <div class="card-header">Header</div>
          <div class="card-body">
            <h5 class="card-title">Secondary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div></div>

      </div>
    </div> -->

    <div class='comments'>

      <?php
      // First Layer
      $sql = "SELECT C.id, C.content, C.created_at, C.user_id, U.nickname FROM yorene_comments as C 
      LEFT JOIN yorene_users as U ON C.user_id = U.id 
      ORDER BY C.created_at DESC LIMIT 5 ";

      $result = $conn->query($sql);
      $resultCheck = $result->num_rows;
      if ($result && $resultCheck > 0) {
        // echo $resultCheck;
        while ($row = $result->fetch_assoc()) {
          $commentId = $row['id'];
          $originPoster = $row['user_id'];
          $content = $row['content'];
          $textContent = htmlspecialchars($content, ENT_QUOTES, 'utf-8');

          // echo "<div class='comment'>";

          // echo  "<h2>" . $row['nickname'] . "</h2>";
          // echo  "<h3 class='comment__created_time'>" . $row['created_at'] . "</h3>";
          // echo  "<p class='comment__content'>" . $textContent . "</p>";

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
          // text-left

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
                // echo "<div class='comment__children original_poster'> ";
                echo "<div class='card m-3 text-white bg-dark comment-children'>";
              } else {
                // echo "<div class='comment__children'>";
                echo "<div class='card m-3 comment-children'>";
              }

              // Week12
              // echo " <h2>" . $childRow['nickname'] . "</h2>";
              // echo " <h3 class='comment__created_time'>" . $childRow['created_at'] . "</h3> ";
              // echo " <p class='comment__content'>" . $childRow['content'] . "</p> ";
              // echo "</div>";

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

      // $childSql = " SELECT * FROM yorene_comments_children ";
      // $childResult = $conn->query($childSql);
      ?>

    </div>

    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>


        <?php
        $pageSql = "SELECT id FROM yorene_comments ";
        $pageResult = $conn->query($pageSql);
        $PageResultCheck = $pageResult->num_rows;
        if ($pageResult == true && $PageResultCheck > 0) {
          // echo $PageResultCheck;
          $pageNumber = ceil($PageResultCheck / 20);
          // echo $pageNumber;
          for ($i = 1; $i <= $pageNumber; $i += 1) {
            // echo "<a href='./page.php?id=$i'>Page $i</a> ";
            echo "<li class='page-item'><a class='page-link' href='./page.php?id=$i'> $i </a></li> ";
          }
        }
        ?>


        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>

  </div>

  <script src='https://code.jquery.com/jquery-3.4.1.js'></script>
  <script src='./index.js'></script>
</body>

</html>