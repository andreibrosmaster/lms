<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['edit'])) {
        // Update code
        
        $id = $_POST['id'];
        $course_content = $_POST['description'];

        // Establish Connection
        require_once('connection.php');

        // Check the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        } else {
            // Define your SQL update query
            $sql = "UPDATE course_content SET course_content = '$course_content' WHERE id = $id";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '<script>window.location = "teacher.php";</script>';
            } else {
                echo "Failed to update teacher information: " . mysqli_error($conn);
            }
        }
    }
}
?>
