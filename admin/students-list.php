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
$result = mysqli_query($conn, "SELECT * FROM register");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student List</title>
</head>
<body>
<div class="container">
  <h2>All Registered Students</h2>
  <a href="add-student.php">Add New Student</a>
  <table border="1">
    <tr>
      <th>Name</th><th>Email</th><th>Mobile</th><th>Password</th><th>Branch</th>
      <th>Date of Birth</th><th>Address</th><th>Actions</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['email']; ?></td>
      <td><?= $row['mobile']; ?></td>
      <td><?= $row['password']; ?></td>
      <td><?= $row['collage_branch']; ?></td>
      <td><?= $row['dateofbirth']; ?></td>
      <td><?= $row['address']; ?></td>
      <td>
        <a href="edit-student.php?id=<?= $row['id']; ?>">Edit</a> | 
        <a href="delete-student.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>
