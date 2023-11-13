<?php

require_once('connection.php');
$query = "SELECT * FROM course_content";
$result = mysqli_query($conn, $query);

$sql = "SELECT * FROM courses";
$res = mysqli_query($conn, $sql);
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
  <link rel="stylesheet" a href="CSS/bootstrap.css"/>
  <link rel="stylesheet" href="courses.css">
</head>
<body>
   

<div class="header" id="header">
<?php include_once('dynamic-header.php'); ?>
<div class="user-greeting">
    <p>Hello, <span id="username">Teacher</span></p>
    </div>
  </div>
</div>



    <div class="user-greeting">
    <p>Hello, <span id="username">Teacher</span></p>
    </div>
  </div>
  <div class="sidebar">
    <ul class="menu">
    <li><a href="teacher-for-teacher.php"><ion-icon name="accessibility-outline"></ion-icon></a></li>
      <li><a href="calendar-for-teacher.php"><ion-icon name="calendar-outline"></ion-icon></a></li>
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
            <h2>Create Course</h2>
            <form id="createForm" name="createForm" action="teacher-create-admin.php" method="POST" enctype="multipart/form-data">
                <label for="course-name">Course Name:</label>
                <input type="text" id="course-name" name="course_name" required>

                <label for="description">Description:</label>
                <textarea id="description" name="course_content" required></textarea>


           
                <button type="submit" class="button-function" name="create">Create Course</button>
            </form>
        </div>

        <!-- Edit Function -->
        <div class="edit">
    <h2>Edit Course Content</h2>
    <form id="editForm" name="editForm" action="teacher-edit-admin.php" method="POST" enctype="multipart/form-data">

        <label for="course-id">Course ID</label>
        <input type="number" id="course-id" name="id" required>

        <label for="description">Description</label>
        <textarea id="description" name="description"></textarea>

      



        <button type="submit" class="button-function" name="edit">Edit Course</button>
    </form>
</div>




        <div class="delete-btn-function">
  <div class="button-delete">
<button onclick="hideShow()">Show Delete</button>
</div>

        <!-- Delete Function -->
        <div class="delete" id="delete">
            <h2>Delete Course</h2>
            <form id="deleteForm" name="deleteForm" action="course-delete.php" method="POST">
                <label for="delete_course_id">Course ID:</label>
                <input type="number" id="delete_course_id" name="id" required>

                <button type="submit" class="button-function" name="delete">Delete Course</button>
            </form>
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
            <h2 class="display-6">COURSES CONTENT</h2>
          </div>
          <div class="card-body">
            <table>
              <tbody>
                <tr class="bg-dark text-white">
                  <td> ID </td>
                  <td> COURSE NAME</td>
                  <td> CONTENT</td>
            
                </tr>
                <tr>
                <?php
                while($row = mysqli_fetch_assoc($result))
                {
                  ?>
              <td><?php echo $row['id'];  ?> </td>
              <td><?php echo $row['course_title'];  ?> </td>
              <td><?php echo $row['course_content'];  ?> </td>
        

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
            <h2 class="display-6">COURSES DATABASE</h2>
           <center><h3 class="display-6">For Reference</h3></center> 
          </div>
          <div class="card-body">
            <table>
              <tbody>
                <tr class="bg-dark text-white">
                  <td> ID </td>
                  <td> COURSE NAME</td>
                  <td> DESCRIPTION</td>
                  <td> LINK</td>
                  <td> IMAGE </td>
                </tr>
                <tr>
                <?php
                while($row = mysqli_fetch_assoc($res))
                {
                  ?>
              <td><?php echo $row['id'];  ?> </td>
              <td><?php echo $row['course_name'];  ?> </td>
              <td><?php echo $row['course_description'];  ?> </td>
              <td><?php echo $row['link'];  ?> </td>
              <td><?php echo $row['image'];  ?> </td>

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
    <script src="popupv.js"></script>
</body>
</html>