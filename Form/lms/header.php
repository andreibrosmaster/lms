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
<?php include_once('dynamic-header.php'); ?>
<div class="user-greeting">
    <p>Hello, <span id="username">Superadmin</span></p>
    </div>
  </div>
</div>

  <div class="sidebar">
  <?php include_once('navigation-menu.php'); ?>


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
    </div>'

        <!-- Edit Function -->
       <div class="edit">
    <h2>Edit Record</h2>
    <form id="editForm" name="edit" action="header-edit.php" method="POST" enctype="multipart/form-data">

        

        <label for="school_name">School Name</label>
    <textarea id="school_name" name="school_name" required></textarea>

    <label for="logo">Header Logo</label>
    <input type="file" id="logo" name="logo" accept="image/jpg" required>

        <button type="submit" name="edit">Edit Data</button>
    </form>
</div>


        <!-- Delete Function -->


       
      
        

</div>


  

    <!-- JavaScript -->
    <script src="lms.js"></script>
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
</body>
</html>