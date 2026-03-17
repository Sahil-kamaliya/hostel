<?php
session_start();
include "connection.php";


if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = $_POST['queryName'];
    $email   = $_POST['queryEmail'];
    $subject = $_POST['querySubject'];
    $message = $_POST['queryMessage'];

    // Insert into query table
    $sql = "INSERT INTO `queries` (name,email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        
        header("Location: student_profile1.php?success=1");
        exit;
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}
?>
