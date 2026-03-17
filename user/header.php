<?php 
// ✅ Start session safely (avoid multiple session warnings)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samarpan Hostel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="nav-container">
            <div class="logo">Samarpan Hostel</div>
            <nav class="nav-menu">
                <a href="index.php" class="nav-item">Home</a>
                <a href="facilities.php" class="nav-item">Facilities</a>
                <a href="gallery.php" class="nav-item">Gallery</a>
                <a href="aboutus.php" class="nav-item">About us</a>
                <!-- <a href="review.php">review</a> -->

                <?php if(isset($_SESSION['name']) && !empty($_SESSION['name'])): ?>
                    <a href="student_profile1.php" class="nav-item">
                        <?= htmlspecialchars($_SESSION['name']); ?> 
                    </a>
                    <a href="logout.php" class="logout-btn">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="logout-btn">Login</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
</body>
</html>
