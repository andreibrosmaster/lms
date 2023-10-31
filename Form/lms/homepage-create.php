<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['edit'])) {
        $edited_textarea = $_POST['edited-textarea'];
        $edited_video = $_FILES['edited-video'];

        // Connect to the database (replace with your database connection code)
        $conn = mysqli_connect("hostname", "username", "password", "database_name");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Handle video upload if a new video is selected
        if ($edited_video['error'] === 0) {
            $edited_video_name = $edited_video['name'];
            $edited_video_tmp = $edited_video['tmp_name'];
            $edited_video_path = 'assets/images/' . $edited_video_name;

            // Update the homepage content with the edited textarea and new video
            $sql = "UPDATE homepage SET textarea = '$edited_textarea', video = '$edited_video_path' WHERE id = 1";

            if (mysqli_query($conn, $sql)) {
                // Move the uploaded video to the desired location
                move_uploaded_file($edited_video_tmp, $edited_video_path);

                echo '<script>window.location = "homepage-db.php";</script>';
            } else {
                echo "Error updating homepage content: " . mysqli_error($conn);
            }
        } else {
            // Update the homepage content with the edited textarea (no new video)
            $sql = "UPDATE homepage SET textarea = '$edited_textarea' WHERE id = 1";

            if (mysqli_query($conn, $sql)) {
                echo '<script>window.location = "homepage-db.php";</script>';
            } else {
                echo "Error updating homepage content: " . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
    }
}
?>
