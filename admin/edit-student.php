<?php  
include 'header.php';

 session_start();
 $checkadmin= $_SESSION['username'];

 if($checkadmin==true){

 }

 else{

    header('location:admin_login.php');
 }



$conn = mysqli_connect("localhost", "root", "", "hostel");
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM register WHERE id = $id");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Edit Student</title></head>
<body>
<div class="container">
  <h2>Edit Student Details</h2>
  <form method="POST" action="update-student.php">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <label>Name:</label><input type="text" name="name" value="<?= $row['name']; ?>">
    <label>Email:</label><input type="email" name="email" value="<?= $row['email']; ?>">
    <label>Branch:</label><input type="text" name="collage_branch" value="<?= $row['collage_branch']; ?>">
    <label>Mobile:</label><input type="text" name="mobile" value="<?= $row['mobile']; ?>">
    <label>Date of birth:</label><input type="date" name="dateofbirth" value="<?= $row['dateofbirth']; ?>">
    <label>Address:</label><input type="text" name="address" value="<?= $row['address']; ?>">
    <button type="submit" name="update">Update</button>
  </form>
</div>
</body>
</html>
