<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['registerBtn'])) {
        // Registration code
        $username = $_POST['register_username'];
        $f_name = $_POST['register_fname'];
        $l_name = $_POST['register_lname'];
        $email = $_POST['register_email'];
        $password = $_POST['register_password'];
        $agree = isset($_POST['register_agree']) ? 1 : 0; // Checkbox value

        // Establish Connection
        require_once('connection.php');
        $emailParts = explode('@', $email);
        $domain = end($emailParts);
        
        if ($domain === 'teacher.lms.com') {
            $userType = 'teacher';
        }
        // Check the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        } else {

    

           
            // Check if the username or email already exists in the database

            if($agree != 1){
                echo "<script>alert('Please agree to the terms and conditions'); window.location.href = 'index.php';</script>";
                exit();

            } else{ $check_query = "SELECT * FROM `users` WHERE username='$username' OR email='$email'";
                $check_result = mysqli_query($conn, $check_query);
    
                if (mysqli_num_rows($check_result) > 0) {
                    echo "<script>alert('Username or email already exists'); window.location.href = 'index.php';</script>";
                    exit();
                } else {


                    if($userType === 'teacher'){
                        

                        //IMPLEMENT TEACHER DATABASE
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
                        // Insert user data into the database
                        $insert_query = "INSERT INTO teachers (username, first_name, last_name, email, password, agree) VALUES ('$username', '$f_name', '$l_name', '$email', '$hashed_password', '$agree')";
                        $result = mysqli_query($conn, $insert_query);


                    } else{
// Hash the password before storing it in the database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
// Insert user data into the database
$insert_query = "INSERT INTO `users` (username, first_name, last_name, email, password, agree) VALUES ('$username', '$f_name', '$l_name', '$email', '$hashed_password', '$agree')";
$result = mysqli_query($conn, $insert_query);

                    }
                    
                    if ($result) {
                        echo "<script>alert('Registration Succesful!'); window.location.href = 'index.php';</script>";
                    exit();
                    } else {
                        die(mysqli_error($conn));
                    }
                }
             }
           
        }
    } elseif (isset($_POST['loginBtn'])) {
        // Login code
        $login_username = $_POST['login_username'];
        $login_password = $_POST['login_password'];


        $userType = 'teacher';


        // Establish Connection
        require_once('connection.php');

        // Check the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect!";
            exit();
        } else {
            // Query the database to check if the user exists
            $sql = "SELECT * FROM `users` WHERE username='$login_username' LIMIT 1";
            $login_result = mysqli_query($conn, $sql);

            if ($login_result && mysqli_num_rows($login_result) == 1) {
                // User found, now check the password
                $userType = null;
                $user_data = mysqli_fetch_assoc($login_result);
                $stored_password = $user_data['password'];

                if (password_verify($login_password, $stored_password)) {
                    // Successful login
                  $agree = $user_data['agree'];

                    if ($agree != 1) {
                        echo "<script>alert('Account Deactivated'); window.location.href = 'index.php';</script>";
                        exit();
                    } else {
                        // Redirect the user based on their role
                        if ($user_data['username'] === 'superadmin') {
                            header("Location: lms/dashboard.php");
                            exit();
                        }  else {
                            echo "Login Successful";
                            header("Location: lms/lms.php");
                            exit();
                        }
                    }
                } else {
                    echo "<script>alert('Invalid password'); window.location.href = 'index.php';</script>";
                    exit();
                }
            }  else {

    // Query the database to check if the user exists
    $sql = "SELECT * FROM teachers WHERE username='$login_username' LIMIT 1";
    $login_result = mysqli_query($conn, $sql);


    if ($login_result && mysqli_num_rows($login_result) == 1) {
// User found, now check the password
$user_data = mysqli_fetch_assoc($login_result);
$stored_password = $user_data['password'];

if (password_verify($login_password, $stored_password)) {
    // Successful login
  $agree = $user_data['agree'];

    if ($agree != 1) {
        echo "<script>alert('Account Deactivated'); window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "Login Successful";
                        header("Location: lms/teacher-for-teacher.php");
                        exit();
    }
} else {
    echo "<script>alert('Invalid password'); window.location.href = 'index.php';</script>";
    exit();
}

    } else{

/* */
echo "<script>alert('Invalid username'); window.location.href = 'index.php';</script>";
exit();
    }







                
            }
        }

        mysqli_close($conn);
    }
}
?>
