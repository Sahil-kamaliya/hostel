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
mysqli_query($conn,"DELETE FROM queries WHERE id=$id");
header("Location: query_list.php");
?>