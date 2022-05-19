<?php 
$host = "localhost";
$user = "root";
$password = "";
$dbName = "hospital";
$con = mysqli_connect($host,$user,$password, $dbName);
session_start();
function auth()
{
    if ($_SESSION['email'] != "") {
    } else {
        header("location:/hospital/general/login.php");
    }
}

?>