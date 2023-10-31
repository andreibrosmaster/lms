<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['create'])) {
        // Registration code
        $course_name = $_POST['course-name'];
        $course_description = $_POST['description'];
        $course_link = $_POST['course-link'];

        if ($_FILES['image']['error'] === 0) {
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_path = 'upload-img/' . $image; // Set the desired path to store the uploaded image

            if (move_uploaded_file($image_tmp, $image_path)) {
                // Establish Connection
                require_once('connection.php');

                // Check the connection
                if (mysqli_connect_errno()) {
                    echo "Failed to connect!";
                    exit();
                }

                // Sanitize inputs and use prepared statements
                $course_name = mysqli_real_escape_string($conn, $course_name);
                $course_description = mysqli_real_escape_string($conn, $course_description);
                $course_link = mysqli_real_escape_string($conn, $course_link);
                $image_path = mysqli_real_escape_string($conn, $image_path);

                $sql = "INSERT INTO courses (course_name, course_description, link, image) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "ssss", $course_name, $course_description, $course_link, $image_path);

                    if (mysqli_stmt_execute($stmt)) {
                        echo '<script>window.location = "courses.php";</script>';
                        exit();
                    } else {
                        die(mysqli_error($conn));
                    }
                } else {
                    die("SQL statement preparation failed: " . mysqli_error($conn));
                }
            } else {
                echo "Failed to move the uploaded file.";
            }
        } else {
            echo "File upload error: " . $_FILES['image']['error'];
        }
    }
}
?>
