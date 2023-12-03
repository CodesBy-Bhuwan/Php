 <?php 
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  include 'partial/_dbconnect.php';
  // $snum = $_POST['serial number'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  // $exists = false;

  //  Check if the user already exists
  $existSql = "SELECT * FROM `users` WHERE username = '$username'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows > 0){
    $showError = "Username already exits";
  }
  else{


  //  $check_user_result = mysqli_query($conn, $check_user_sql);

  //  if (mysqli_num_rows($check_user_result) > 0) {
  //      $exists = true;
  //      $showError = "Username already exists";
  //  } 
  // else
  if(($password == $cpassword)) {
    // sql code here!
    $sql = "INSERT INTO `users` (`serial number`, `username`, `password`, `date`) VALUES (NULL, '$username', '$password', current_timestamp())";
    // INSERT INTO `users` (`serial number`, `username`, `password`, `date`) VALUES (NULL, 'sql', 'sdf', current_timestamp());
    // Check whether the primary key is set auto else we have to ensure through manually enrolling
    $result = mysqli_query($conn, $sql);
    if($result){
      $showAlert = true;
      // die("Error)
    }
    else{
      // $showError = "Password doesn't match";
      // $showError = "Error" . mysqli_error($conn);
      // die("Error: " . mysqli_error($conn));
      $showError = "Password don't match";
  }
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
        Try Again </div>';
      }
      ?>
  
      <li></li>
    <form action="" method="post">
    <h1>Sign Up</h1>
    <label for="username">Username</label> <br>
    <input type="text" name="username" id="username">
    <li></li>
    <label for="password">Password</label><br>
    <input type="password" name="password" id="password">
    <li></li>
    <label for="cpassword">Confirm Password</label> <br>
    <input type="password" name="cpassword" id="cpassword">
    <p>Make sure to type the correct password</p>
    <button>Submit</button>
    <!-- <button >Submit</button> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </form>
  </body>
</html>