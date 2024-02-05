$(document).ready(function () {
    $('#submit').click(function (e) {
        e.preventDefault()
        var formData = $('#login_form').serializeArray();
        $.ajax({
            url: '../conn/register.php',
            type: 'POST',
            data: JSON.stringify(formData),
            success: function (json) {
                // var result = new Array();
                var data = JSON.parse(json);
                var keys = Object.keys(data);
                // keys.forEach(function(key){
                //     result.push(json[key]);
                // });
                $(".message").text(data[keys]);
                if (data[keys] == 'Registered') {
                    $(".message_display").addClass("success_message");
                    $("#login_form").trigger('reset');
                }
                else {
                    $(".message_display").addClass("error_message");
                }
                $(".message").text(data[keys]);
                $(".message_display").show();
                var stopTime = setTimeout(() => {
                    $('.close_massage').click();
                }, 3000);
            }

        });
    });
    $('.close_massage').click(function (e) {
        $(".message_display").hide();
        if ($(".message_display").hasClass("success_message")) {
            $(".message_display").removeClass("success_message");
        }
        else if ($(".message_display").hasClass("error_message")) {
            $(".message_display").removeClass("error_message");
        }

    });

});