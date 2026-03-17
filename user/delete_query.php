<?php
session_start();
require 'connection.php';
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM query WHERE id=$id");
header("Location: List.php");
?>