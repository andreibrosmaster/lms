<?php
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    if (isset($_POST['update'])) {

        $id = $_POST['id'];
        // Establish Connection
        require_once('connection.php');

        // Check the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        } else {
            $status = $_POST['status'];

            $update_query = "UPDATE `users` SET agree = '$status' WHERE id = '$id'
            UNION
            UPDATE teachers` SET agree = '$status' WHERE id = '$id'
            ";
            $result = mysqli_query($conn, $update_query);

            if ($result) {
                echo '<script>window.location = "dashboard.php";</script>';
            } else {
                echo "Failed to update status: " . mysqli_error($conn);
            }
            
        }
    }
}
?>
