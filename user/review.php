<?php include 'header.php' ?>



<?php

include "connection.php";




if(isset($_POST['submit'])){
$name=$_POST['name'];
$rate=$_POST['rate'];
$skill=$_POST['skill'];
$rate2=$_POST['rate2'];


 $sql="INSERT INTO `add`(`name`, `rate`, `skill`, `rate2`) VALUES ('$name','$rate','$skill','$rate2')";

$result=mysqli_query($conn,$sql);

}
?>



<!DOCTYPE html>
<body>
  <form action="review.php" method="post">

 name:<input type="text" name="name"><br>
 5<input type="radio" name="rate" value="5"><br>
 4<input type="radio" name="rate" value="4"><br>
 3<input type="radio" name="rate" value="3"><br>
 2<input type="radio" name="rate" value="2"><br>
 1<input type="radio" name="rate" value="1"><br>

 <select name="skill">
    <option>skills......</option>
    <option>php</option>
    <option>asp,net</option>
    <option>jsp</option>

 </select><br>

 <select name="rate2" id="">
    <option>good</option>
    <option>poor</option>
 </select><br><br>

 <button type="submit" name="submit">send</button>



  </form>


</body>


</html>

<?php include 'footer.php' ?>