<?php
require_once('valid_user.php');
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
      <h1 class="display-4">Review Comments</h1>
    </div>
  </div>

  <div class='container'>

    <?php

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

        // bootstrap
        echo "<div class='card mb-3' commentId=$row[id]>";
        echo "  <div class='card-header'>";
        echo "    <span>" . $row['nickname'] . "</span>";
        echo "    <span class='text-right text-muted'> 🕛 " . $row['created_at'] . "</span>";
        echo "  </div>";
        echo "  <div class='card-body'>";
        echo "    <p class='card-text'>" . $textContent . "</p>";
        echo "    <a class='btn btn-outline-primary' href='update.php?id=$row[id]'>Update/Edit</a>";
        echo "    <button class='btn btn-outline-primary' type='button' name='delete' commentId=$row[id]>Delete/Remove</button>";
        echo "  </div> ";
        echo "</div> ";
      }
    }
    ?>

  </div>

  <script src='https://code.jquery.com/jquery-3.4.1.js'></script>
  <script src='./admin.js'></script>
</body>

</html>