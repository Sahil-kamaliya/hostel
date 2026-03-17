<?php
require 'connection.php';

if (isset($_POST['SUBMIT'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $cpassword= $_POST['cpassword'];
    $mobile   = $_POST['mobile'];
    $collage  = $_POST['collage'];
    $address  = $_POST['address'];
    $bod      = $_POST['bod'];

    if (empty($name) || empty($email) || empty($password) || empty($cpassword) || empty($mobile) || empty($address) || empty($bod)) {
        echo "<script>alert('All fields are required'); history.back();</script>";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Enter valid email'); history.back();</script>";
        exit;
    }
    if ($password !== $cpassword) {
        echo "<script>alert('Passwords do not match'); history.back();</script>";
        exit;
    }
    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        echo "<script>alert('Mobile must be 10 digits'); history.back();</script>";
        exit;
    }

    $check = mysqli_query($conn, "SELECT * FROM register WHERE email='$email' OR mobile='$mobile'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Email or Mobile already exists'); history.back();</script>";
        exit;
    }

    $photo = '';
    if (!empty($_FILES['photo']['name'])) {
        $targetDir = "../profile/";
        if (!is_dir($targetDir)) mkdir($targetDir);
        $photo = time() . "_" . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $targetDir . $photo);
    }

    $sql = "INSERT INTO register (name,email,password,mobile,address,dateofbirth,collage_branch,profile)
            VALUES ('$name','$email','$password','$mobile','$address','$bod','$collage','$photo')";
    
    if (mysqli_query($conn,$sql)) {
        echo "<script>alert('Registered successfully'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Database error'); history.back();</script>";
    }
}
?>



<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="rbox1">
    <div class="rbox2">
        <div class="rbox3">
            <form method="POST" enctype="multipart/form-data" >
                <h2 class="registertext">Registration</h2>

                <label class="lablel1">Enter Name</label><br>
                <input type="text" name="name" class="reginput"><br>

                <label class="lablel1">Enter Email</label><br>
                <input type="email" name="email" class="reginput"><br>

                <label class="lablel1">Enter Password</label><br>
                <input type="password" name="password" class="reginput"><br>

                <label class="lablel1">Confirm Password</label><br>
                <input type="password" name="cpassword" class="reginput"><br>

                <label class="lablel1">Enter Mobile</label><br>
                <input type="text" name="mobile" class="reginput"><br>

                <label class="lablel1">Enter School/College/Workplace</label><br>
                <input type="text" name="collage" class="reginput"><br>

                <label class="lablel1">Enter Address</label><br>
                <input type="text" name="address" class="reginput"><br>

                <label class="lablel1">Enter Date of Birth</label><br>
                <input type="date" name="bod" class="reginput"><br>

                <label class="lablel1">Choose Profile Photo (optional)</label><br>
                <input type="file" name="photo" class="reginput" accept="image/*"><br>

                <button type="submit" name="SUBMIT" class="registerbutton">Register</button>
                <button type="reset" class="registerbutton">Clear</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
