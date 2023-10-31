<?php
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    if (isset($_POST['edit'])) {

        $id = $_POST['id'];
        // Establish Connection
        require_once('connection.php');

        // Check the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        } else {
            // Construct the SQL query dynamically based on the checkboxes
            $sql = "UPDATE `users` SET ";
            $updateFields = array();

            // Check if each field's corresponding checkbox is checked and add it to the updateFields array
            if (isset($_POST['update-username'])) {
                $username = $_POST['username'];
                $updateFields[] = "username = '$username'";
            }

            if (isset($_POST['update-firstname'])) {
                $f_name = $_POST['firstname'];
                $updateFields[] = "first_name = '$f_name'";
            }

            if (isset($_POST['update-lastname'])) {
                $l_name = $_POST['lastname'];
                $updateFields[] = "last_name = '$l_name'";
            }

            if (isset($_POST['update-email'])) {
                $email = $_POST['email'];
                $updateFields[] = "email = '$email'";
            }

            if (isset($_POST['update-password'])) {
                $password = $_POST['password'];
                $updateFields[] = "password = '$password'";
            }

            // Join the updateFields array with commas
            $sql .= implode(', ', $updateFields);
            $sql .= " WHERE id = '$id'";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '<script>window.location = "dashboard.php";</script>';
                exit();
            } else {
                die(mysqli_error($conn));
            }
        }
    }
}
?>
