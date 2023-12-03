<?php 
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  include 'partial/_dbconnect.php';
  // $snum = $_POST['serial number'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  

    $sql = "Select * from users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      // After logged in where the portal has to be open is stated[located] here
      header("location: index.php");
    }
    else{
     $showError = "Invalid Username or Password";
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <?php require 'partial/_nav.php'; ?>

  <?php
  if($login){
    echo '
    <div role="alert">
    Login Successful </div>';
  }

  if($showError){
    echo '
    <div role="alert">
    The entered data is wrong </div>';
  }
  ?>
    <form action="" method="post" name="username">
    <label for="username">Username</label> <br>
    <input type="text" name="username" id="username">
    <li></li>
    <label for="password">Password</label><br>
    <input type="password" name="password" id="password">
    <li></li>
    <button>Submit</button>
    </form>
  </body>
</html>