<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['edit'])) {
        // Registration code
        $school_name = $_POST['school_name'];
        $id = 1;
       
       
        $logo = $_FILES['logo']['name']; // Get the filename of the uploaded video
        $logo_tmp = $_FILES['logo']['tmp_name']; // Get the temporary location of the uploaded video


        $logo_path = 'logo/' . $logo; // Set the desired path to store the uploaded video

        // Establish Connection
        require_once('connection.php');

        // Check the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        } else {
            // Insert user data into the database
            $sql = "UPDATE header SET school_name = '$school_name', logo = '$logo_path' WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // Move the uploaded video to the desired location
                move_uploaded_file($logo_tmp, $logo_path);

                echo '<script>window.location = "header.php";</script>';
                exit();
            } else {
                die(mysqli_error($conn));
            }
        }
    } 
}
?>
