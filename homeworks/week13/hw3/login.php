<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

  <?php
  require_once('header_nav.php');
  ?>

  <div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
      <h1 class="display-4">Login</h1>
    </div>
  </div>

  <div class='container text-center'>

    <form method='POST' action="./handle_login.php">

      <div class='p-2'>Username: <input type="text" name='username'></div>
      <div class='p-2'>Password: <input type="password" name='password'></div>
      <div class="p-2"><input type="submit" class="btn btn-primary"></div>
    </form>
  </div>
</body>

</html>