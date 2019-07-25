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

  <div class='container'>

    <div class='comments'>

      <?php
      $page = $_GET['id'];
      $offsetNumber = ($page - 1) * 20;

      $sql = "SELECT C.content, C.created_at, U.nickname FROM yorene_comments as C 
      LEFT JOIN yorene_users as U ON C.user_id = U.id 
      ORDER BY C.created_at DESC 
      LIMIT 20 OFFSET $offsetNumber ";

      $result = $conn->query($sql);
      $resultCheck = $result->num_rows;
      if ($result && $resultCheck > 0) {
        while ($row = $result->fetch_assoc()) {
          $content = $row['content'];
          $textContent = htmlspecialchars($content, ENT_QUOTES, 'utf-8');

          echo "<div class='card mb-3'>";
          echo "  <div class='card-header'>";
          echo "    <span>" . $row['nickname'] . "</span>";
          echo "    <span class='text-right text-muted'> 🕛 " . $row['created_at'] . "</span>";
          echo "  </div>";
          echo "  <div class='card-body'>";
          echo "    <p class='card-text'>" . $textContent . "</p>";
          echo "  </div> ";
          echo "</div> ";
        }
      }
      ?>

    </div>

    <?php
    require_once('footer.php');
    ?>

  </div>
</body>

</html>