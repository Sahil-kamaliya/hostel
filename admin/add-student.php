<?php include 'header.php';
 session_start();
 $checkadmin= $_SESSION['username'];

 if($checkadmin==true){

 }

 else{

    header('location:admin_login.php');
 }


?>

<form method="POST" action="add-student-process.php">
  <label>Name:</label><input type="text" name="name"><br>
  <label>Email:</label><input type="email" name="email"><br>
  <label>Password:</label><input type="password" name="password"><br>
  <label>Mobile:</label><input type="text" name="mobile"><br>
  <label>Branch:</label><input type="text" name="collage_branch"><br>
  <label>Date of Birth:</label><input type="date" name="dateofbirth"><br>
  <label>Address:</label><input type="text" name="address"><br>
  <button type="submit" name="submit">Add Student</button>
</form>
