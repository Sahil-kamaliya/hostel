<?php
session_start();

require 'connection.php';

// Session check
if (!isset($_SESSION['name']) || empty($_SESSION['name'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['name'];
$email = $_SESSION['email'];

// Delete query
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete_sql = "DELETE FROM queries WHERE id=$delete_id AND email='$email'";
    mysqli_query($conn, $delete_sql);
    header('Location: student_profile1.php');
    exit;
}

// Fetch student details
$email = mysqli_real_escape_string($conn, $email); 

$sql = "SELECT * FROM `register` WHERE `email` = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 0) {
    echo "<p style='color:red; text-align:center;'>No student found!</p>";
    exit;
}

$row = mysqli_fetch_assoc($result);

?>
<?php  include 'header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samarpan Hostel - Student Details</title>
    <link rel="stylesheet" href="student_profile1.css">
</head>
<body>
    
    <div class="container">
        <div class="welcome-section">
            <h1>Welcome Back, <?php echo htmlspecialchars($row['name']); ?> </h1>
            <p>Student Dashboard - Manage your hostel experience</p>
        </div>

        <div class="details-card">
            <h2 class="card-title">Student Profile</h2>
            
            <div class="profile-section">
                <div class="profile-image">
                    <?php 
                    if (!empty($row['profile']) && file_exists(__DIR__ . "/../profile/" . $row['profile'])) {
                        echo "<img src='../profile/" . htmlspecialchars($row['profile']) . "' 
                              alt='Profile Photo' 
                              style='width:100px; height:100px; border-radius:50%; object-fit:cover;'>";
                    } else {
                        echo "👤";
                    }
                    ?>
                </div>
                <div class="profile-info">
                    <h2><?php echo htmlspecialchars($row['name']); ?></h2>
                    <p><?php echo htmlspecialchars($row['email']); ?></p>
                </div>
            </div>

            <div class="details-grid">
                <div class="detail-item">
                    <div class="detail-label">Full Name</div>
                    <div class="detail-value"><?php echo htmlspecialchars($row['name']); ?></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Email Address</div>
                    <div class="detail-value"><?php echo htmlspecialchars($row['email']); ?></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Mobile Number</div>
                    <div class="detail-value"><?php echo htmlspecialchars($row['mobile']); ?></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Date of Birth</div>
                    <div class="detail-value">
                        <?php 
                        if (!empty($row['dateofbirth']) && $row['dateofbirth'] != "0000-00-00") {
                            echo date("d F Y", strtotime($row['dateofbirth']));
                        } else {
                            echo "📅 Not provided";
                        }
                        ?>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">School/College/Workplace</div>
                    <div class="detail-value"><?php echo htmlspecialchars($row['collage_branch']); ?></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Address</div>
                    <div class="detail-value"><?php echo htmlspecialchars($row['address']); ?></div>
                </div>
            </div>
        </div>

        <!-- Query Form -->
        <div class="query-section">
            <h2 class="card-title">Send Query to Admin</h2>
            <form method="POST" action="add-query.php">
                <div class="form-group">
                <label>Your Name</label>
                    <input type="text" name="queryName" value="<?php echo htmlspecialchars($row['name']); ?>" required readonly>
                </div>
                <div class="form-group">
                <label>Your Email</label>
                    <input type="email" name="queryEmail" value="<?php echo htmlspecialchars($row['email']); ?>" required readonly>
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="querySubject" placeholder="Enter subject of your query" required>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="queryMessage" placeholder="Write your query here..." required></textarea>
                </div>
                <button type="submit" class="submit-btn" name="submit">Send Query</button>
            </form>
        </div>

        <!-- Student Queries Section -->
        <div class="details-card">
            <h2 class="card-title">Your Queries</h2>
            <?php
            $query_sql = "SELECT * FROM queries WHERE email='$email' ORDER BY id DESC";
            $query_result = mysqli_query($conn, $query_sql);

            if (mysqli_num_rows($query_result) > 0) {
                echo '<table class="query-table">
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>';
                while ($row = mysqli_fetch_assoc($query_result)) {
                    $statusClass = '';
                    if (strtolower($row['status']) == 'pending') $statusClass = 'status-pending';
                    elseif (strtolower($row['status']) == 'resolved') $statusClass = 'status-resolved';
                    else $statusClass = 'status-other';

                    echo '<tr>
                            <td>' . $row['id'] . '</td>
                            <td>' . htmlspecialchars($row['subject']) . '</td>
                            <td>' . htmlspecialchars($row['message']) . '</td>
                            <td class="' . $statusClass . '">' . ucfirst($row['status']) . '</td>
                            <td>' . $row['created_at'] . '</td>
                            <td>
                                <a href="edit_query.php?id=' . $row['id'] . '" class="btn-edit">Edit</a>
                                <a href="?delete_id=' . $row['id'] . '" class="btn-delete" onclick="return confirm(\'Are you sure?\');">Delete</a>
                            </td>
                        </tr>';
                }
                echo '</table>';
            } else {
                echo "<p class='no-data'>No queries submitted yet.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
