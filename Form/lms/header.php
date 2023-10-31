<?php

require_once('connection.php');
$query = "SELECT * FROM header";
$result = mysqli_query($conn, $query);

$squery = "SELECT * FROM header WHERE id = 1;";
$resulta = mysqli_query($conn, $squery);

if (mysqli_num_rows($resulta) > 0) {
    while ($header_row = mysqli_fetch_assoc($resulta)) {
        // Display the 'textarea' and 'video' columns
        $school_name = $header_row['school_name'];
        $logo = $header_row['logo'];

    }}


?>
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
   
<div class="header" id="header">
    <div class="logo">
      <!-- Place your logo here -->
      <img src="<?php echo "$logo"?>" alt="" class="logo-ncu">    
      <span class="company-name"><?php echo "$school_name"?></span>
    </div>



    <div class="user-greeting">
    <p>Hello, <span id="username">Superadmin</span></p>
    </div>
  </div>
  <div class="sidebar">
    <ul class="menu">
    <li><a href="header.php"><ion-icon name="laptop-outline"></ion-icon></a></li>
    <li><a href="homepage-db.php"><ion-icon name="easel-outline"></ion-icon></a></li> 
    <li><a href="teacher.php"><ion-icon name="accessibility-outline"></ion-icon></a></li>
      <li><a href="dashboard.php"><ion-icon name="people-outline"></ion-icon></a></li>
      <li><a href="courses.php"><ion-icon name="book-outline"></ion-icon></a></li>
      <li><a href="calendar.php"><ion-icon name="calendar-outline"></ion-icon></a></li>
      <li>
        <form action="logout.php" method="post">
          <button type="submit" name="logoutBtn"><ion-icon name="log-out-outline"></ion-icon></button>
        </form>
      </li>
    </ul>
  </div>


 
  <div class="container">

  <div class="functions">

<!-- Create Function -->
<div class="create">
            <h2>Add Record</h2>
            <form id="createForm" name="create" action="header-create.php" method="POST" enctype="multipart/form-data">
    <label for="school_name">School Name</label>
    <textarea id="school_name" name="school_name" required></textarea>

    <label for="logo">Header Logo</label>
    <input type="file" id="logo" name="logo" accept="image/png" required>

    <button type="submit" name="create">Add Data</button>
</form>


        </div>

        <!-- Edit Function -->
       <div class="edit">
    <h2>Edit Record</h2>
    <form id="editForm" name="edit" action="header-edit.php" method="POST" enctype="multipart/form-data">

        

        <label for="school_name">School Name</label>
    <textarea id="school_name" name="school_name" required></textarea>

    <label for="logo">Header Logo</label>
    <input type="file" id="logo" name="logo" accept="image/png" required>

        <button type="submit" name="edit">Edit Data</button>
    </form>
</div>


        <!-- Delete Function -->


       
      
        

</div>

<div class="container_table">
  <div class="db-table">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h2 class="display-6">Landing Page</h2>
          </div>
          <div class="card-body">
            <table>
              <tbody>
                <tr class="bg-dark text-white">
                  <td> ID </td>
                  <td> School Name</td>
                  <td> Logo</td>
                </tr>
                <tr>
                <?php
                while($row = mysqli_fetch_assoc($result))
                {
                  ?>
              <td><?php echo $row['id'];  ?> </td>
              <td><?php echo $row['school_name'];  ?> </td>
              <td><?php echo $row['logo'];  ?> </td>

                </tr>
              <?php
                }
                ?>
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  

    <!-- JavaScript -->
    <script src="lms.js"></script>
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
</body>
</html>