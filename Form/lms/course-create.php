<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['create'])) {
        // Registration code
        $course_name = $_POST['course-name'];
        $course_description = $_POST['description'];
        $course_link = $_POST['course-link'];
       
        $image = $_FILES['image']['name']; // Get the filename of the uploaded image
        $image_tmp = $_FILES['image']['tmp_name']; // Get the temporary location of the uploaded image
        $image_path = 'C:/xampp/htdocs/webdev2/Index/Form/upload-img/' . $image; // Set the desired path to store the uploaded image

        // Establish Connection
        require_once('connection.php');

        // Check the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        } else {
            // Insert user data into the database
            $sql = "INSERT INTO courses (course_name, course_description, link, image) VALUES ('$course_name', '$course_description', '$course_link', '$image_path')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>window.location = "courses.php";</script>';
                exit();
            } else {
                die(mysqli_error($conn));
            }
        }
    } 
}
?>