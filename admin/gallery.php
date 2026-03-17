<?php
include 'connection.php';

 session_start();
 $checkadmin= $_SESSION['username'];

 if($checkadmin==true){

 }

 else{

    header('location:admin_login.php');
 }


// ---------- Delete Image ----------
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $res = mysqli_query($conn, "SELECT * FROM gallery WHERE id=$id");
    $row = mysqli_fetch_assoc($res);
    $image = $row['image'];

    // delete file
    if (file_exists("../gallery/" . $image)) {
        unlink("../gallery/" . $image);
    }

    // delete record
    mysqli_query($conn, "DELETE FROM gallery WHERE id=$id");
    header("Location: gallery.php");
    exit();
}

// ---------- Upload Image ----------
if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $target = "../gallery/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        mysqli_query($conn, "INSERT INTO gallery (image) VALUES ('$image')");
        $msg = "Image uploaded successfully!";
    } else {
        $msg = "Error uploading image.";
    }
}
?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Gallery Management</title>
</head>
<body>
    <h2>Add New Image</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Select Image:</label>
        <input type="file" name="image" required>
        <button type="submit" name="upload">Upload</button>
    </form>
    <p style="color:green;"><?php if(isset($msg)) echo $msg; ?></p>

    <h2>Gallery List</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM gallery");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td><img src='../gallery/{$row['image']}' width='100'></td>
                    <td>
                        <a href='gallery.php?delete={$row['id']}' onclick=\"return confirm('Are you sure?')\">Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
