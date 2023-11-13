<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your School Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <style>
        /* Your custom CSS here */
        body {
            font-family: "Lucida Console", "Courier New", monospace !important;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        #calendar-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-family: 'Arial', sans-serif;
            font-size: 36px;
            color: #e53935;
        }

        .calendar-note {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }

        #calendar {
            margin-top: 20px;
        }

        .fc-head {
            background-color: #e53935;
            color: white;
        }

        .fc-event {
            background-color: #0288d1;
            border: none;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: relative;
            border-radius: 5px;
            padding: 10px;
            margin: 5px;
            font-size: 16px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .fc-event:hover {
            background-color: #0277bd;
        }

        .fc-button-primary {
            background-color: #e53935;
        }

        .school-event {
            background-color: #0288d1;
            border: none;
            color: white;
            font-size: 11px;
        }

        .holiday-event {
            background-color: #d32f2f;
            border: none;
            color: white;
            font-size: 12px;
        }

        .fc-day[data-date="2023-10-07"] {
            background-color: transparent !important;
        }

        .school-event {
            animation: pulse 1s infinite alternate;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.05);
            }
        }

        .event-details {
            display: none;
            background-color: #fff;
            padding: 20px;
            border: 2px solid #e53935;
            border-radius: 10px;
            position: absolute;
            z-index: 1000;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            width: 300px;
            left: 50%;
            transform: translateX(-50%);
        }

        .fc-event.interactive {
            cursor: pointer;
        }

        .event-tooltip {
            display: none;
            position: absolute;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            z-index: 1000;
            font-size: 14px;
        }

        .delete-button {
            color: #fff;
            background-color: #e53935;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 5px;
        }

        .static-event {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<div class="sidebar">
  <?php include_once('navigation-menu.php'); ?>
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
</body>
</html>
