<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['create'])) {
        // Registration code
        $course_name = $_POST['textarea'];

       
        $video = $_FILES['video']['name']; // Get the filename of the uploaded video
        $video_tmp = $_FILES['video']['tmp_name']; // Get the temporary location of the uploaded video
        $video_path = 'assets/images/' . $video; // Set the desired path to store the uploaded video

        // Establish Connection
        require_once('connection.php');

        // Check the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        } else {
            // Insert user data into the database
            $sql = "INSERT INTO homepage (textarea, video) VALUES ('$course_name', '$video_path')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // Move the uploaded video to the desired location
                move_uploaded_file($video_tmp, $video_path);

                echo '<script>window.location = "homepage-db.php";</script>';
                exit();
            } else {
                die(mysqli_error($conn));
            }
        }
    } 
}
?>