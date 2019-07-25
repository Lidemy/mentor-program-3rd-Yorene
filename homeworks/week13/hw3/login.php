<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="./style_user.css">
</head>

<body>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="./add_user.php">Sign Up</a></li>
    </ol>
  </nav>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Login</h1>
    </div>
  </div>

  <div class='container'>

    <form method='POST' action="./handle_login.php">
    
      <div >Username: <input type="text" name='username'></div>
      <div>Password: <input type="password" name='password'></div>
      <input type="submit" class="btn btn-primary">
    </form>

  </div>
</body>

</html>