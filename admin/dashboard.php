<?php 
session_start();
$checkadmin= $_SESSION['username'];

if(!$checkadmin){
    header('location:admin_login.php');
}

require 'connection.php';

// TOTAL REGISTER STUDENT
$total_student_query="SELECT count(*) as count FROM register ";
$total_admin_query="SELECT count(*) as count FROM admin";

$total_student_result=mysqli_query($conn,$total_student_query);
$total_admin_result=mysqli_query($conn,$total_admin_query);

if (!$total_admin_result) {
    die("admin query failed".mysqli_error($conn));
}

if (!$total_student_result) {
    die("student query failed".mysqli_error($conn));
}

$total_student=mysqli_fetch_assoc($total_student_result)['count'];
$total_admin=mysqli_fetch_assoc($total_admin_result)['count'];

// TODAY LOGIN STUDENTS
$today = date("Y-m-d");  
$student_login_query="SELECT COUNT(DISTINCT id) as count 
                      FROM user_login 
                      WHERE DATE(login_time)='$today'";

$student_result=mysqli_query($conn,$student_login_query);

if (!$student_result) {
    die("student login query failed".mysqli_error($conn));
}

$student_login_today=mysqli_fetch_assoc($student_result)['count'];
?>

<?php include 'header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
</head>
<body>
<div class="container">
  <h2>Welcome to Admin Dashboard</h2>
  <table>
    <tr><th>Total Students</th><td><?php echo $total_student; ?></td></tr>
    <tr><th>Total Admins</th><td><?php echo $total_admin; ?></td></tr>
    <tr><th>Total Branches</th><td>4</td></tr>
    <tr><th>Today's Student Logins</th><td><?php echo $student_login_today; ?></td></tr>
  </table>
</div>
</body>
</html>
