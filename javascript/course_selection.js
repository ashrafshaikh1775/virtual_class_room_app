$(document).ready(function () {
    $('#enroll').click(function (e) {
        e.preventDefault()
        var formData = $('#course_form').serializeArray();
        $.ajax({
            url: '../conn/course_selection.php',
            type: 'POST',
            data: JSON.stringify(formData),
            success: function (json) {
                var data = JSON.parse(json);
                var keys = Object.keys(data);
                if (data[keys] == 'status 200') {
                    // $("#login_form").trigger('reset');
                location.href = 'student_dashboard.php';
                }
                else{
                    $(".message_display").addClass("error_message");
                    $(".message").text(data[keys]);
                    $(".message_display").show();
                    var stopTime = setTimeout(() => {
                        $('.close_massage').click();
                    }, 3000);
                }
  

            }

        });
    });
    $('.close_massage').click(function (e) {
        $(".message_display").hide();
       if ($(".message_display").hasClass("error_message")) {
            $(".message_display").removeClass("error_message");
        }

    });

});