<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="./style_user.css">
</head>
<body>
  <div class='container'>
    <h1>Comments Board - Login</h1>
    <a href="./add_user.php">Sign Up</a>
    <a href="./index.php">Comments Board</a>

      <form method='POST' action="./handle_login.php">

        <div>Username: <input type="text" name='username'></div>
        <div>Password: <input type="password" name='password'></div>
        <input type="submit">
      </form>
      
  </div>
</body>
</html>
