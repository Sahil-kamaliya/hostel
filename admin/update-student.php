<?php

 session_start();
 $checkadmin= $_SESSION['username'];

 if($checkadmin==true){

 }

 else{

    header('location:admin_login.php');
 }

$conn = mysqli_connect("localhost", "root", "", "hostel");
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $branch = $_POST['collage_branch'];
  $mobile = $_POST['mobile'];
  $dob = $_POST['dateofbirth'];
  $address = $_POST['address'];

  $query = "UPDATE register SET name='$name', email='$email', collage_branch='$branch', mobile='$mobile', dateofbirth='$dob', address='$address' WHERE id=$id";
  mysqli_query($conn, $query);
  header("Location: students-list.php");
}
?>
