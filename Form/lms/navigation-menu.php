
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DASHBOARD</title>
  <link rel="stylesheet" href="lms.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>
   


  

  <div class="sidebar">
    <ul class="menu">

    <li><a href="header.php"><ion-icon name="laptop-outline"></ion-icon><span class="navi-dashboard">Header</span></a></li>
    <li><a href="homepage-db.php" class="navi-link"><ion-icon name="easel-outline"></ion-icon><span class="navi-dashboard">Landing Page</span></a></li> 
    <li><a href="teacher.php" class="navi-link"><ion-icon name="accessibility-outline"></ion-icon><span class="navi-dashboard">Course Content</span></a></li>
      <li><a href="dashboard.php" class="navi-link"><ion-icon name="people-outline"></ion-icon><span class="navi-dashboard">Users</span></a></li>
      <li><a href="courses.php" class="navi-link"><ion-icon name="book-outline"></ion-icon><span class="navi-dashboard">Course Box</span></a></li>
      <li><a href="calendar.php" class="navi-link"><ion-icon name="calendar-outline"></ion-icon><span class="navi-dashboard">Calendar</span></a></li>
      <li>
        <form action="logout.php" method="post">
          <button type="submit" name="logoutBtn"><ion-icon name="log-out-outline"></ion-icon></button>
        </form>
      </li>
    </ul>
  </div>


 

  

    <!-- JavaScript -->
    <script src="lms.js"></script>
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <script src="popup.js"></script>
</body>
</html>