<?php

require_once('connection.php');
$query = "SELECT * FROM homepage";
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
            <form id="createForm" name="create" action="homepage-create.php" method="POST" enctype="multipart/form-data">
    <label for="textarea">TextArea</label>
    <textarea id="textarea" name="textarea" required></textarea>

    <label for="video">Video Background</label>
    <input type="file" id="video" name="video" accept="video/mp4,video/x-m4v,video/*" required>

    <button type="submit" name="create">Add Data</button>
</form>


        </div>

        <!-- Edit Function -->
       <div class="edit">
    <h2>Edit Record</h2>
    <form id="editForm" name="edit" action="homepage-edit.php" method="POST" enctype="multipart/form-data">

      

        <label for="textarea">TextArea</label>
    <textarea id="textarea" name="textarea" required></textarea>

    <label for="video">Video Background</label>
    <input type="file" id="video" name="video" accept="video/mp4,video/x-m4v,video/*" required>

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
                  <td> Text</td>
                  <td> Video</td>
                </tr>
                <tr>
                <?php
                while($row = mysqli_fetch_assoc($result))
                {
                  ?>
              <td><?php echo $row['id'];  ?> </td>
              <td><?php echo $row['textarea'];  ?> </td>
              <td><?php echo $row['video'];  ?> </td>

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