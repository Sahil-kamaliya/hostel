<?php
require 'connection.php';

 session_start();
 $checkadmin= $_SESSION['username'];

 if($checkadmin==true){

 }

 else{

    header('location:admin_login.php');
 }

$status = isset($_GET['status']) ? $_GET['status'] : 'Pending';

if($status=='All'){
  $result = mysqli_query($conn,"SELECT * FROM queries ORDER BY created_at DESC");
}else{
  $result = mysqli_query($conn,"SELECT * FROM queries WHERE status='$status' ORDER BY created_at DESC");
}
?>
<?php include 'header.php'; ?>
<h2>Admin Query Management (<?php echo $status; ?>)</h2>
<a href="query_list.php?status=All">All</a> | 
<a href="query_list.php?status=Pending">Pending</a> | 
<a href="query_list.php?status=Solved">Solved</a> | 
<a href="query_list.php?status=Rejected">Rejected</a>
<table border="1" cellpadding="10">
<tr><th>Name</th><th>Email</th><th>Message</th><th>Status</th><th>Date</th><th>Action</th></tr>
<?php while($q=mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?php echo $q['name']; ?></td>
<td><?php echo $q['email']; ?></td>
<td><?php echo $q['message']; ?></td>
<td><?php echo $q['status']; ?></td>
<td><?php echo $q['created_at']; ?></td>
<td>
<?php if($q['status']=='Pending'){ ?>
<a href="update_query.php?id=<?php echo $q['id']; ?>&status=Solved">Solve</a> |
<a href="update_query.php?id=<?php echo $q['id']; ?>&status=Rejected">Reject</a>
<?php } else { ?>
<a href="update_query.php?id=<?php echo $q['id']; ?>&status=Pending">Set Pending</a>
<?php } ?>
| <a href="delete_query.php?id=<?php echo $q['id']; ?>">Delete</a>
</td></tr>
<?php } ?>
</table>
