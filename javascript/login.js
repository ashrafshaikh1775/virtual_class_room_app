$(document).ready(function () {
    $('#submit').click(function (e) {
        e.preventDefault()
        var formData = $('#login_form').serializeArray();
        $.ajax({
            url: 'conn/login.php',
            type: 'POST',
            data: JSON.stringify(formData),
            success: function (json) {
                var data = JSON.parse(json);
                var keys = Object.keys(data);
                if (data[keys[0]] == 'status 200') {
                    if (data[keys[1]] == '') {
                        $("#login_form").trigger('reset');
                        $(".message_display").addClass("success_message");
                        $(".message").text("Logged In");
                        location.href = 'php/course_selection.php';
                    }
                    else {
                        $(".message_display").addClass("warning_message");
                        $(".message").text("please wait until approved");
                       }
                }
                else if (data[keys[0]] == 'status 400') {
                     location.href = 'php/student_dashboard.php';
                }
                else if (data[keys[0]] == 'status 600') {
                    if (data[keys[1]] == '') {
                        // location.href = 'php/course_selection.php';
                    }
                    else {
                          console.log(json);
                        // location.href = 'php/student_dashboard.php';
                    }
                }
                else if (data[keys[0]] == 'status 800') {
                    $("#login_form").trigger('reset');
                    $(".message_display").addClass("success_message");
                    $(".message").text("Logged In");
                    location.href = 'php/admin.php';
                }
                else {
                    $(".message_display").addClass("error_message");
                    $(".message").text(data[keys[0]]);
                }
                $(".message_display").show();
                var stopTime = setTimeout(() => {
                    $('.close_massage').click();
                }, 1500);
            }

        });
    });
    $('.close_massage').click(function (e) {
        $(".message_display").hide();
        if ($(".message_display").hasClass("success_message")) {
            $(".message_display").removeClass("success_message");
        }
        if ($(".message_display").hasClass("warning_message")) {
            $(".message_display").removeClass("warning_message");
        }
        else {
            $(".message_display").removeClass("error_message");
        }

    });

});