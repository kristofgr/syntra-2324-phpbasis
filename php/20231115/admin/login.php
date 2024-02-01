<?php
// 
// $_SESSION['secret'] = 'appel';

if (isset($_POST['username']) && isset($_POST['password'])) {

  require('../includes/db.inc.php');
  $user = checkUser($_POST['username'], $_POST['password']);

  if ($user) {
    session_start();
    $_SESSION["loggedin"] = TRUE;
    $_SESSION["user"] = $user;

    header("Location: index.php");
    exit;
  }


  // print '<pre>';
  // var_dump($user);
  // exit;


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1>Login</h1>
    <form method="post" action="login.php">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= @$_POST['username']; ?>">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>