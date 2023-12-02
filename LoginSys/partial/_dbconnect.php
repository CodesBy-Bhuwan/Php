<?php 
// $server = "mysql:host=localhost; dbname=users564";
$server = "localhost";
$username = "root";
$password = "";
$database = "users564";
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error" . mysqli_connect_error());
}

?>