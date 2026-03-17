<?php

 session_start();
 $checkadmin= $_SESSION['username'];

 if($checkadmin==true){

 }

 else{

    header('location:admin_login.php');
 }

require 'connection.php';
$id=$_GET['id'];
$status=$_GET['status'];
mysqli_query($conn,"UPDATE queries SET status='$status' WHERE id=$id");
header("Location: query_list.php");
?>