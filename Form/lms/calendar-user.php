<?php
require_once('connection.php');

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
<html>
<head>
    <meta charset="UTF-8">
    <title>Your School Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="lms.css">
    <link rel="stylesheet" href="calendar.css">

</head>
<body>



<div class="header" id="header">
<?php include_once('dynamic-header.php'); ?>
<div class="user-greeting">
    <p>Hello, <span id="username">Student</span></p>
    </div>
  </div>
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

    <div id="calendar-container">
        <h1>SCHOOL CALENDAR</h1>
        <div class="calendar-note">
            <p>Welcome to the school calendar. Stay updated with important events and activities.</p>
        </div>
        <div id="calendar"></div>
        <div class="event-details" id="event-details">
            <h3 id="event-title"></h3>
            <p id="event-description"></p>
            <a id="event-link" href="#" target="_blank">Learn More</a>
        </div>
        <div class="event-tooltip" id="event-tooltip">
            <h3 id="tooltip-title"></h3>
            <p id="tooltip-description"></p>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                defaultDate: new Date(),
                navLinks: true,
                editable: true,
                eventLimit: true,
                events: [
                    {
                        title: 'School Assembly',
                        start: '2023-10-10',
                        className: 'school-event interactive',
                        description: 'Join us for a school assembly in the auditorium.',
                        link: '#',
                        editable: false
                    },
                    {
                        title: 'Christmas Break',
                        start: '2023-12-20',
                        end: '2024-01-05',
                        className: 'holiday-event',
                        description: 'Happy Holidays!',
                        editable: false
                    },
                    
                ],
                eventClick: function(calEvent, jsEvent, view) {
                    $('#event-title').text(calEvent.title);
                    $('#event-description').text(calEvent.description);
                    $('#event-link').attr('href', calEvent.link);
                    $('#event-details').css({
                        top: jsEvent.pageY + 5,
                        left: jsEvent.pageX + 5
                    }).show();
                },
                eventMouseover: function(event, jsEvent, view) {
                    $('#tooltip-title').text(event.title);
                    $('#tooltip-description').text(event.description);
                    $('#event-tooltip').css({
                        top: jsEvent.pageY + 5,
                        left: jsEvent.pageX + 5
                    }).show();
                },
                eventMouseout: function(event, jsEvent, view) {
                    $('#event-tooltip').hide();
                },
                eventRender: function(event, element) {
                    if (event.editable && event.className.includes('interactive')) {
                        var deleteButton = $('<button class="delete-button">Delete</button>');
                        deleteButton.click(function() {
                            calendar.fullCalendar('removeEvents', event._id);
                        });
                        element.append(deleteButton);
                    }
                }
            });

            $(document).click(function() {
                $('#event-details').hide();
            });

            $('#event-details').click(function(event) {
                event.stopPropagation();
            });
        });
    </script>
        <script type="module" src="https://unpkg.com/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>
