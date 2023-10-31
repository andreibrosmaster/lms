$(document).ready(function () {
    // Attach a click event handler to course boxes
    $('.course-box').click(function (e) {
        var courseName = $(this).data('course-name');

        // Perform an AJAX request here
        $.ajax({
            url: 'ajax_fetch.php', // Replace with your server-side script URL
            type: 'POST',
            data: { course_name: courseName },
            success: function (response) {
                // Update the modal content with the AJAX response
                $('.modal-body').html(response);
                $('.modal-title').text(courseName);
                // Open the Bootstrap modal
                $('.modal').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});
