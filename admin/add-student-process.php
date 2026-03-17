<?php

 session_start();
 $checkadmin= $_SESSION['username'];

 if($checkadmin==true){

 }

 else{

    header('location:admin_login.php');
 }

$conn = mysqli_connect("localhost", "root", "", "hostel");
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $mobile = $_POST['mobile'];
  $branch = $_POST['collage_branch'];
  $dob = $_POST['dateofbirth'];
  $address = $_POST['address'];

  $query = "INSERT INTO register (name, email, password, mobile, collage_branch, dateofbirth, address) 
            VALUES ('$name', '$email', '$password', '$mobile', '$branch', '$dob', '$address')";
  mysqli_query($conn, $query);
  header("Location: students-list.php");
}
?>
