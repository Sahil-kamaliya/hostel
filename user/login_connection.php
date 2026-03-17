<?php
session_start();
require 'connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT `email`, `password`, `id`, `name` 
        FROM `register` 
        WHERE `email`='$email' AND `password`='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    $user_id = $row['id'];
    $name = $row['name'];  

    // Insert login history
    $sql2 = "INSERT INTO `user_login`(`id`, `email`, `password`) 
             VALUES ($user_id, '$email', '$password')";
    mysqli_query($conn, $sql2);

    // Store in session
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;  
    header("Location: student_profile1.php");
    exit;
} else {
    echo "Invalid login";
}
?>
