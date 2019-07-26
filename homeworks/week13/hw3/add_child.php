<?php
require_once('valid_user.php');
require_once('conn.php');

$commentId = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reply</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="./admin.php">Review Comments</a></li>
      <li class="breadcrumb-item"><a href="./logout.php">Logout</a></li>
    </ol>
  </nav>

  <div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
      <h1 class="display-4">Reply Comments</h1>
    </div>
  </div>

  <div class='container'>

    <form method='POST' action="./handle_add_child.php">

      <?php
      // Week9: user id => 取得 nickname
      $sql = "SELECT nickname FROM yorene_users WHERE id = '$userId'";
      $result = $conn->query($sql);
      $resultCheck = $result->num_rows;
      if ($result && $resultCheck > 0) {
        $row = $result->fetch_assoc();
        $nickname = $row['nickname'];

        echo "<div class='p-2'>Nickname: $nickname </div>";
        echo "<div class='p-2'>Comment: <textarea class='form-control' name='content' rows='5'></textarea></div>";

        echo "<div><input type='hidden' name='comment_id' value='$commentId'></div>";
      }
      ?>

      <div class="p-2 text-center"><input type="submit" class="btn btn-primary"></div>
    </form>

  </div>
</body>

</html>