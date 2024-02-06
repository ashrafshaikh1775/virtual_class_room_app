$(document).ready(function () {
    var formData = { "this": "norun" };
    $.ajax({
        url: '../conn/course_selection.php',
        type: 'POST',
        data: JSON.stringify(formData),
        success: function (json) {
            var data = JSON.parse(json);
            var keys = Object.keys(data);
            if (data[keys] != "") {
                $("#enroll").prop('disabled', true);
                $("#enroll").addClass('disable');

                $(".message_display").addClass("error_message");
                $(".message").text(data[keys]);
                $(".message_display").show();
                var stopTime = setTimeout(() => {
                    $('.close_massage').click();
                }, 3000);
            }
        }
    });
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
                if (data["message"] == 'status 200') {
                    $("#enroll").prop('disabled', true);
                    $("#enroll").addClass('disable');
                    $("#login_form").trigger('reset');
                    $(".message_display").addClass("success_message");
                    $(".message").text(data["wait_message"]);
                    var stopTimer = setTimeout(() => {
                        location.href = '../';
                    }, 3000);

                }
                else {
                    $(".message_display").addClass("error_message");
                    $(".message").text(data[keys]);
                }
               
                $(".message_display").show();
                var stopTime = setTimeout(() => {
                    $('.close_massage').click();
                }, 3000);

            }

        });
    });
    $('.close_massage').click(function (e) {
        $(".message_display").hide();
        if ($(".message_display").hasClass("error_message")) {
            $(".message_display").removeClass("error_message");
        }
        else if ($(".message_display").hasClass("success_message")) {
            $(".message_display").removeClass("success_message");
        }
        else{
            if ($(".message_display").hasClass("warning_message")) {
                $(".message_display").removeClass("warning_message");
            }
        }

    });

});