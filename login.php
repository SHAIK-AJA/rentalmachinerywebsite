<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('db.php');

if (isset($_POST['login_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users2 WHERE email='$email'";
    $result = mysqli_query($conn, $query);
     

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

         
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            header("location: mainmachines.html");
            exit();
        } else {
            header('location: log.php?error=Incorrect password');
            exit();
        }
    } else {
        header('location: log.php?error=please Register to continue');
        exit();
    }
}
?>
