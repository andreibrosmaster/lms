<?php
session_start();

// Check if the session variable 'username' is set and not empty
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    // Database connection details
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "register";

    // Create a new MySQLi instance and establish the connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check the connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Assuming you have retrieved the logged-in user's ID or username safely
    $userID = $_SESSION['username']; // Replace with your own session variable or user identifier

    // Query the database to retrieve the username (use prepared statements)
    $query = "SELECT username FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query was successful and retrieve the username
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
    } else {
        $username = "User"; // Default username if retrieval fails
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Handle the case when 'username' session variable is not set or empty
    // For example, you can redirect the user to a login page or show an error message
    echo "User is not logged in."; // You can customize this message
}

// Include the necessary HTML files
include 'hello_user.php'; // Include the file that sets $username
include 'lms.php'; // Include your main HTML file
?>
