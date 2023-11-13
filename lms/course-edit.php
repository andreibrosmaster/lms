<?php
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    if (isset($_POST['edit'])) {
        // Edit code
        $id = $_POST['id'];

        // Establish Connection
        require_once('connection.php');

        // Check the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        } else {
            // Construct the SQL query dynamically based on the checkboxes
            $sql = "UPDATE courses SET ";
            $updateFields = array();

            // Check if each field's corresponding checkbox is checked and add it to the updateFields array
            if (isset($_POST['update-course-name'])) {
                $course_name = $_POST['course-name'];
                $updateFields[] = "course_name = '$course_name'";
            }

            if (isset($_POST['update-description'])) {
                $course_description = $_POST['description'];
                $updateFields[] = "course_description = '$course_description'";
            }

            if (isset($_POST['update-course-link'])) {
                $course_link = $_POST['course-link'];
                $updateFields[] = "link = '$course_link'";
            }

            if (isset($_POST['update-image'])) {
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $image_path = 'C:/xampp/htdocs/webdev2/Index/Form/upload-img/' . $image;
                $updateFields[] = "image = '$image_path'";
            }

            // Join the updateFields array with commas and add the WHERE clause to identify the record
            $sql .= implode(', ', $updateFields);
            $sql .= " WHERE id = '$id'";

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
