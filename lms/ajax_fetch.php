<?php
include('connection.php');

$course_name = $_POST['course_name'];

$sql = "SELECT * from course_content WHERE course_title = '$course_name'";
$result =mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
$row =mysqli_fetch_assoc($result);
echo "<h2>".$row['course_title']."</h2>";
echo "<p>".$row['course_content']."</p>";

}

?>