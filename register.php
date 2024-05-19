<?php
include('db.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_POST['reg_user'])) {
    $email = $_POST['email'];
    $password1 = $_POST['password_1'];
    $password2 = $_POST['password_2'];

    // Check if passwords match
    if ($password1 !== $password2) {
        header("Location: reg.php?error=Passwords do not match.");
        exit();
    }

    // Check if email already exists
    $query = "SELECT * FROM users2 WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        header("Location: reg.php?error=You can login now.");
        exit();
    }

    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

    $query = "INSERT INTO users2 (email, password) VALUES ('$email', '$hashed_password')";
    mysqli_query($conn, $query);

    header("Location: log.php?message=Registration successful. Please login.");
    exit();
}
