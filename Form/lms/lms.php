<?php
require_once('connection.php');
$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);

$squery = "SELECT * FROM header WHERE id = 1;";
$resulta = mysqli_query($conn, $squery);

if (mysqli_num_rows($resulta) > 0) {
    while ($header_row = mysqli_fetch_assoc($resulta)) {
        // Display the 'textarea' and 'video' columns
        $school_name = $header_row['school_name'];
        $logo = $header_row['logo'];

    }}

function getRandomColor() {
  $letters = '0123456789ABCDEF';
  $color = '#';
  for ($i = 0; $i < 6; $i++) {
      $color .= $letters[rand(0, 15)];
  }
  return $color;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NCU LMS</title>
  <link rel="stylesheet" href="lms.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
  <link rel="stylesheet" href="dashboard.css">
  <link rel="stylesheet" href="fetch_courses.css">
</head>
<body>
   

<div class="header" id="header">
    <div class="logo">
      <!-- Place your logo here -->
      <img src="<?php echo "$logo"?>" alt="Logo" class="logo-ncu">    
      <span class="company-name"><?php echo "$school_name"?></span>
    </div>



   <!--USERNAME SHOW---->
    <div class="user-greeting">
    <p>Hello, <span id="username"> Student</span></p>
    </div>

  </div>
  <div class="sidebar">
    <ul class="menu">
      <li><a href="lms.php"><ion-icon name="home-outline"></ion-icon></a></li>
      <li><a href="calendar-user.php"><ion-icon name="calendar-outline"></ion-icon></a></li>
      <li>
        <form action="logout.php" method="post" name="logout">
          <button type="submit" name="logoutBtn"><ion-icon name="log-out-outline"></ion-icon></button>
        </form>
      </li>
    </ul>
  </div>

  <div class="container-lms">
  <?php

  //
      //PRACTICE 
  
  //
      if(mysqli_num_rows($result) == 0){
        
        echo '<p>No Courses Available</p>';
      } else{
        
        while ($course = mysqli_fetch_assoc($result)) {
          $imagePath = 'upload-img/' . strtolower($course['course_name'] ) .'.jpg';
          $randomColor = getRandomColor();

          echo '<div class="box course-box box-' . strtolower($course['course_name']) . '" data-course-name="' . $course['course_name'] . '" style="background-color: ' .  $randomColor . ';">';
           if (file_exists($imagePath)) {
            echo '<img src="' . $imagePath . '" alt="' . $course['course_name'] . '">';
    } else {
        echo 'Image not found.';
    }
          echo '<div class="box-content">';
          echo '<h2 id="courseName1">' . $course['course_name'] . '</h2>';
          echo '<p style="font-size: 12px;"> ' . strtolower($course['course_description']) . '.</p>';
          echo '</div>';
          echo '</div>';
      }
      
      }

        ?>


<!---- MY AJAX MODAL -->

<div class="modal" tabindex="-1">
  <div class="modal-dialog custom-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Course title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Course body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!-- END OF AJAX MODAL -->
  </div>  <!-- JavaScript -->
 
   
    <script type="module" src="https://unpkg.com/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
<script nomodule="" src="https://unpkg.com/ionicons@latest/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="ajax.js"></script>
    <script src="randomcolor.js"></script>
  </body>
</html>