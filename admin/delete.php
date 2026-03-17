<?php

 session_start();
 $checkadmin= $_SESSION['username'];

 if($checkadmin==true){

 }

 else{

    header('location:admin_login.php');
 }


$conn = mysqli_connect("localhost", "root", "", "hostel");




if(isset($_POST['delete'])){

    $id = $_POST['id'];




    // Get Image Path

    $result = mysqli_query($conn, "SELECT image FROM gallery WHERE id=$id");

    $row = mysqli_fetch_assoc($result);

    $imagePath = $row['image'];




    // Delete Image File

    if(file_exists($imagePath)){

        unlink($imagePath);

    }




    // Delete from Database

    mysqli_query($conn, "DELETE FROM gallery WHERE id=$id");

    header("Location: g

allery.php");

}

?>