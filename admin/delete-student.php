<?php

 session_start();
 $checkadmin= $_SESSION['username'];

 if($checkadmin==true){

 }

 else{

    header('location:admin_login.php');
 }

$conn = mysqli_connect("localhost", "root", "", "hostel");
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM register WHERE id=$id");
header("Location: students-list.php");
?>
