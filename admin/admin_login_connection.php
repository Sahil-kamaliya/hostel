<?php
 session_start();
  
 $checkadmin= $_SESSION['username'];

 if($checkadmin==true){

 }

 else{

    header('location:admin_login.php');
 }

 require 'connection.php';

 $username=$_POST['username'];
 $password=$_POST['password'];

 $sql="SELECT `username`, `password` FROM `admin` WHERE `username`='$username' AND `password`='$password'";

$result=mysqli_query($conn,$sql);



if(mysqli_num_rows($result)==1) {

      $_SESSION['username']=$username;
      header("Location:dashboard.php");
    }
    else{

    	echo "error is".mysqli_error($conn);
    }
    	
      
 ?>