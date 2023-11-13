<?php

require 'connection.php';

if(isset($_POST["create"])){
    //VARIABLES
    $course_name = $_POST['course-name'];
    $course_description = $_POST['description'];
    $course_link = $_POST['course-link'];

    if($_FILES["image"]["error"] === 4){
        echo "<script> alert('Image Does Not Exist'); </script>";
    } else{
        $fileName = $_FILES["image"]["name"];
    }
}

?>
