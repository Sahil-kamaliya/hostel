<?php  include'header.php' ?>
<link rel="stylesheet" type="text/css" href="style.css">
<center><h2>Gallery</h2></center>

  <div class="galarydiv">
    <?php include 'connection.php'; ?>

<?php
$res = mysqli_query($conn, "SELECT * FROM gallery");
while ($row = mysqli_fetch_assoc($res)) {
  echo "<img src='../gallery/{$row['image']}' width='150' style='margin:10px;'>";
}
?>

</div>

<?php  include'footer.php' ?>