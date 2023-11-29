<?php 
$dsn = "mysql:host=localhost; dbname=users564";
$username = "root";
$password = "";
$database = "users";
$conn = mysqli_connect($dsn, $username, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

?>