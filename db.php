<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "user_authentication";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
