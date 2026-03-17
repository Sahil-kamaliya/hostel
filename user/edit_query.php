<?php
session_start();
include "connection.php";


if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];


if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: student_profile1.php");
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM queries WHERE id=$id AND email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    
    header("Location: student_profile1.php");
    exit;
}

$queryData = mysqli_fetch_assoc($result);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['querySubject'];
    $message = $_POST['queryMessage'];

    $update_sql = "UPDATE queries SET subject='$subject', message='$message' WHERE id=$id AND email='$email'";
    if (mysqli_query($conn, $update_sql)) {
        header("Location: student_profile1.php?updated=1");
        exit;
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Query</title>
    <link rel="stylesheet" href="student_profile1.css"> 
</head>
<body>
    <div class="query-section">
        <h2 class="card-title">Edit Your Query</h2>

        <form method="POST">
            <div class="form-group">
                <label for="querySubject">Subject</label>
                <input type="text" id="querySubject" name="querySubject" 
                       value="<?php echo htmlspecialchars($queryData['subject']); ?>" required>
            </div>

            <div class="form-group">
                <label for="queryMessage">Message</label>
                <textarea id="queryMessage" name="queryMessage" required><?php echo htmlspecialchars($queryData['message']); ?></textarea>
            </div>

            <button type="submit" class="submit-btn">Update Query</button>
            <a href="student_profile1.php" class="btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
