<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['create'])) {
        // Registration code
        $course_name = $_POST['course_name'];
        $course_content = $_POST['course_content'];

        // Establish Connection
        require_once('connection.php');

        // Check the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        } else {
            // Insert user data into the database
            $sql = "INSERT INTO course_content (course_title, course_content) VALUES ('$course_name', '$course_content')";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo '<script>window.location = "teacher.php";</script>';
            }
        }
    } 
}
?>
