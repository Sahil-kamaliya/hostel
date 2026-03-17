<?php
session_start();
require 'connection.php';

$user_id = $_SESSION['id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM register WHERE id=$user_id"));

$message = $_POST['message'];

mysqli_query($conn, "INSERT INTO query (name,email,message) VALUES ('{$user['name']}','{$user['email']}','$message')");

header("Location: List.php");
?>