<?php

require_once('connection.php');
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);


$sql = "SELECT * FROM teachers";
$result_teach = mysqli_query($conn, $sql);

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
            <form id="createForm" name="createForm" action="create.php" method="POST">

           

                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" required>

                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="email">Temporary Password</label>
                <input type="text" id="password" name="password" required>

                

                <button type="submit" name="add">Add Student</button>
            </form>
        </div>

        <!-- Edit Function -->
       <div class="edit">
    <h2>Edit Record</h2>
    <form id="editForm" name="editForm" action="edit.php" method="POST">

        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required>

        <label for="username">Username: <input type="checkbox" name="update-username" value="1"></label>
        <input type="text" id="username" name="username">

        <label for="firstname">First Name: <input type="checkbox" name="update-firstname" value="1"></label>
        <input type="text" id="firstname" name="firstname">

        <label for="lastname">Last Name: <input type="checkbox" name="update-lastname" value="1"></label>
        <input type="text" id="lastname" name="lastname">

        <label for="email">Email: <input type="checkbox" name="update-email" value="1"></label>
        <input type="email" id="email" name="email">

        <label for="password">Change Password: <input type="checkbox" name="update-password" value="1"></label>
        <input type="text" id="password" name="password" >

        <button type="submit" name="edit">Edit Data</button>
    </form>
</div>


        <!-- Delete Function -->




        <!----DO NOT COPY---->
  <div class="delete-btn-function">
  <div class="button-delete">
<button onclick="hideShow()">Show Delete</button>
</div>

  </div>
  
  <div class="delete" id="delete">
  <h2>Delete Record</h2>
  <form id="deleteForm" name="deleteForm" action="delete.php" method="POST">
    <label for="delete_course_id">ID Number</label>
    <input type="number" id="delete_course_id" name="id" required>

    <button type="submit" name="delete">Delete</button>
  </form>
        </div>


        <div class="status-box" id="update">
      <h2>Status</h2>
      <form id="status-update" name="status-form" action="update.php" method="POST">
      <label for="status-id">ID Number:</label>
      <input type="number" id="status-id" name="id" required>

      <input type="radio" name="status" value="1"> Active
      <br>
      <br>
<input type="radio" name="status" value="0"> Inactive
  
      <button type="submit" name="update">Update</button>
      <form>
        </div>
  </div>
        
       
      
        

</div>

<div class="container_table">
  <div class="db-table">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h2 class="display-6">STUDENT DATABASE</h2>
          </div>
          <div class="card-body">
            <table>
              <tbody>
                <tr class="bg-dark text-white">
                  <td> ID </td>
                  <td> USERNAME</td>
                  <td> FIRST NAME</td>
                  <td> LAST NAME </td>
                  <td> EMAIL </td>
                  <td> Status </td>
                </tr>
                <tr>
                <?php
                while($row = mysqli_fetch_assoc($result))
                {
                  ?>
              <td><?php echo $row['id'];  ?> </td>
              <td><?php echo $row['username'];  ?> </td>
              <td><?php echo $row['first_name'];  ?> </td>
              <td><?php echo $row['last_name'];  ?> </td>
              <td><?php echo $row['email'];  ?> </td>
              <td style="color: <?php echo ($row['agree'] == 0) ? 'red' : 'inherit'; ?>">
                <?php echo ($row['agree'] == 1) ? 'Active' : 'Inactive'; ?></td>

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


<div class="container_table">
  <div class="db-table">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h2 class="display-6">TEACHER DATABASE</h2>
          </div>
          <div class="card-body">
            <table>
              <tbody>
                <tr class="bg-dark text-white">
                  <td> ID </td>
                  <td> USERNAME</td>
                  <td> FIRST NAME</td>
                  <td> LAST NAME </td>
                  <td> EMAIL </td>
                  <td> Status </td>
                </tr>
                <tr>
                <?php
                while($row = mysqli_fetch_assoc($result_teach))
                {
                  ?>
              <td><?php echo $row['id'];  ?> </td>
              <td><?php echo $row['username'];  ?> </td>
              <td><?php echo $row['first_name'];  ?> </td>
              <td><?php echo $row['last_name'];  ?> </td>
              <td><?php echo $row['email'];  ?> </td>
              <td style="color: <?php echo ($row['agree'] == 0) ? 'red' : 'inherit'; ?>">
                <?php echo ($row['agree'] == 1) ? 'Active' : 'Inactive'; ?></td>

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
    <script src="popup.js"></script>
</body>
</html>