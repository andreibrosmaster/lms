<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['add'])) {
        // Registration code
        $username = $_POST['username'];
        $f_name = $_POST['firstname'];
        $l_name = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $agee = 1;
    

        // Establish Connection
        require_once('connection.php');

        // Check the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        } else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
                    // Insert user data into the database
                    $sql = "INSERT INTO `users` (username, first_name, last_name, email, password, agree) VALUES ('$username', '$f_name', '$l_name', '$email', '$hashed_password', '$agree')";
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
