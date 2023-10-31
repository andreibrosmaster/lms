<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['edit'])) {
        $course_id = $_POST['id'];
        $course_name = $_POST['course-name'];
        $course_description = $_POST['description'];
        $course_link = $_POST['course-link'];

        // Connect to the database (replace with your database connection code)
        require_once('connection.php');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $image_path = 'upload-img/' . $_FILES['image']['name'];

        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            $sql = "UPDATE courses SET course_name = '$course_name', course_description = '$course_description', link = '$course_link', image = '$image_path' WHERE id = $course_id";

            if (mysqli_query($conn, $sql)) {
                echo '<script>window.location = "courses.php";</script>';
            } else {
                echo "Error updating course: " . mysqli_error($conn);
            }
        } else {
            echo "Failed to move the uploaded file.";
        }

        mysqli_close($conn);
    }
}
?>
