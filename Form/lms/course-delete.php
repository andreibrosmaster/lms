<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['delete'])) {
        // Establish Connection
        require_once('connection.php');

        // Check the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        } else {
            // Sanitize and validate the $id variable
            $id = $_POST['id']; // Assuming the ID is passed as a hidden field in the form

            // Prepare the SQL statement using a prepared statement
            $sql = "DELETE FROM courses WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);

            // Execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>window.location = "courses.php";</script>';
                exit();
            } else {
                die(mysqli_error($conn));
            }

            // Close the prepared statement and database connection
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
    }
}
?>
