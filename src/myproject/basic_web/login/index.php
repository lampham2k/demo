<?php
// session_start(); update bỏ ss vì ở file home đã ss rồi.
if(isset($_COOKIE['remember'])){
  $token = $_COOKIE['remember'];
  require '../admin/connect.php';
  $sql = "select * from customers where token = '$token' limit 1";
  $result = mysqli_query($connect , $sql);
  $number_rows = mysqli_num_rows($result);
  if($number_rows == 1){
    $each = mysqli_fetch_array($result);
    $_SESSION['id'] = $each['id'];
    $_SESSION['name'] = $each['name'];
  }
}
if(isset($_SESSION['id'])){
  header('location:../user.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="login.css" type="text/css" />
  </head>
  <body>
    <form method="post" action="process_signin.php">
      <div class="segment">
        <h1>Sign in</h1>
      </div>

      <label>
        <input type="text" placeholder="Email Address" name="email" />
      </label>
      <label>
        <input type="password" placeholder="Password" name="password" />
      </label>
      <button class="red" type="submit">
        <i class="icon ion-md-lock"></i> Log in
      </button>

      <div class="segment">
        remember login                
        <input type="checkbox" name="remember" class="ck">
        <br>
        <button class="unit" type="button" method="">
          <i class="icon ion-md-arrow-back"></i>
        </button>
        <!-- <button class="unit" type="button">
          <i class="icon ion-md-bookmark"></i>
        </button>
        <button class="unit" type="button">
          <i class="icon ion-md-settings"></i>
        </button> -->
      </div>

      <div class="input-group">
        <label>
          <input type="text" placeholder="Email Address" />
        </label>
        <button class="unit" type="button">
          <i class="icon ion-md-search"></i>
        </button>
      </div>
    </form>
    <a href="forgot_password.php">
      forgot password
    </a>
  </body>
</html>
