<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="./login.php">Login</a></li>
    </ol>
  </nav>

  <div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
      <h1 class="display-4">Sign Up</h1>
      <p class="lead">本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</p>
    </div>
  </div>

  <div class='container text-center'>

    <form method='POST' action="./handle_add_user.php">

      <div class="p-2">Username: <input type="text" name='username'></div>
      <div class="p-2">Password: <input type="password" name='password'></div>
      <div class="p-2">Nickname: <input type="text" name='nickname'></div>
      <div class="p-2"><input type="submit"  class="btn btn-primary"></div>
    </form>

  </div>
</body>
</html>