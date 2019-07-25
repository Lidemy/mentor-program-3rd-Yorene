<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up</title>
  <link rel="stylesheet" href="./style_user.css">
</head>
<body>
  <div class='container'>
    <h1>Sign Up</h1>
    <p>本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</p>
    <a href="./login.php">Login</a>
    <a href="./index.php">Comments Board</a>

      <form method='POST' action="./handle_add_user.php">

        <div>Username: <input type="text" name='username'></div>
        <div>Password: <input type="password" name='password'></div>
        <div>Nickname: <input type="text" name='nickname'></div>
        <input type="submit">
      </form>
      
  </div>
</body>
</html>
