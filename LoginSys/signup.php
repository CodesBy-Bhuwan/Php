<?php 
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  include 'partial/_dbconnect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $exists = false;
  if(($password == $cpassword) && $exists == false) {
    // sql code here!
    $sql = "INSERT INTO `users` (`serial number`, `username`, `password`, `date`) VALUES ( '$username', '$password', current_timestamp());";
    $result = mysqli_query($conn, $sql);
    if($result){
      $showAlert = true;
    }
    else{
      $showError = "Password doesn't match";
  }
}
  
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
      <?php require 'partial/_nav.php'; ?>

      <?php
      if($showAlert){
        echo '
        <div role="alert">
        Success </div>';
      }

      if($showError){
        echo '
        <div role="alert">
        Success  </div>';
      }
      ?>
  
      <li></li>
      <form action="/LoginSys/signup.php" method="post">
    <h1>Sign Up</h1>
    <h6>Username</h6>
    <input type="text" id="username">
    <li></li>
    <h6>Password</h6>
    <input type="any" name="password" id="password">
    <li></li>
    <h6>Confrom Password</h6>
    <input type="any" name="cpassword" id="password">
    <p>Make sure to type the correct password</p>
    <button >Submit</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </form>
  </body>
</html>