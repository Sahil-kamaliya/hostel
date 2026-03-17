<?php
$servername="";
$username="root";
$password="";
$database="hostel";



$conn=mysqli_connect($servername,$username,$password,$database);

if (!$conn) {
	die("sorry we can not connect".mysqli_connect_error());
}


?>