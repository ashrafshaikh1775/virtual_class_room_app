$(document).ready(function () {
    var formData = { "this": "norun" };
    $.ajax({
        url: '../conn/manage_tutors.php',
        type: 'POST',
        data: JSON.stringify(formData),
        success: function (json) {
            // console.log(json);
            var data = JSON.parse(json);
            var keys = Object.keys(data);
            var i = 0;
            data.forEach((val) => {
                if (val['tutor_varified'] != "") {
                    $("table").append("<tr><td class='table_td' tid=" + keys[i] + ">" + val['tutor_first_name'] + "</td><td><input type='checkbox' name='checkbox' value=" + keys[i] + " checked></td><td><input type='submit' name='add_lectures' class='add_lectures' value='Add Lectures' tid=" + keys[i] + "></input></td></tr>");
                }
                else {
                    $("table").append("<tr><td class='table_td' tid=" + keys[i] + ">" + val['tutor_first_name'] + "</td><td><input type='checkbox' name='checkbox' value=" + keys[i] + "></td><td><input type='submit' name='add_lectures' class='add_lectures' value='Add Lectures' tid=" + keys[i] + "></input></td></tr>");
                }
                i++;
            });
            $("td[class='table_td']").click(function (e) {
                var name = data[$(this).attr("tid")]["tutor_first_name"] + ' ' + data[$(this).attr("tid")]["tutor_last_name"];
                var contact = data[$(this).attr("tid")]["tutor_mobile"];
                var education = data[$(this).attr("tid")]["tutor_qualification"];
                //    var formData = {"this" : "run" ,"tid" :data[$(this).attr("tid")]["tutor_id"]};
                //    $.ajax({
                //     url: '../conn/manage_tutors.php',
                //     type: 'POST',
                //     data: JSON.stringify(formData),
                //     success: function (json) {
                //         var datafind = JSON.parse(json);
                //         var keysfind = Object.keys(datafind);
                //         if(datafind.length >= 1){
                //             $('#uenrolled').text(datafind[keysfind]["tutor_course_names"]);
                //             }
                //         else{
                //             $('#uenrolled').text('');
                //         }
                //     }
                // });

                $('#uname').text(name);
                $('#ucontact').text(contact);
                $('#ueducation').text(education);
            });
            $("input[type='checkbox']").change(function (e) {
                if ($(this).is(":checked")) {
                    update_prmission({ "this": "fast_run", "data": "yes", "tid": data[$(this).attr("value")]["tutor_id"] });
                }
                else {
                    update_prmission({ "this": "fast_run", "data": "", "tid": data[$(this).attr("value")]["tutor_id"] });
                }
            });
            // third column (lectures) coding start here
            $(".dialog_box_heading").click(function (e) {
                e.stopPropagation();
            });
            $(document).on("click", ".dialog_box_content", function (e) {
                e.stopPropagation();
            });
            $(document).on("click", ".dialog_box", ".dialog_box_close", function (e) {
                $(".dialog_box_content").html('');
                $(".dialog_box").css("display", "none");
            });
            var tutor_lectures = "";
            var check_id = "";
            $("input[name='add_lectures']").click(function (e) {
                e.preventDefault();
                $('.dialog_box_heading_name').text(data[$(this).attr("tid")]["tutor_first_name"] + ' ' + data[$(this).attr("tid")]["tutor_last_name"]);
                if (tutor_lectures == "") {
                    tutor_lectures = data[$(this).attr("tid")]["tutor_lectures"];
                    check_id = $(this).attr("tid");
                    update_prmission({ "this": "fast_run_no" }, data[$(this).attr("tid")]["tutor_id"], tutor_lectures);
                }
                else{
                    if(check_id == $(this).attr("tid"))
                    {
                    data[$(this).attr("tid")]["tutor_lectures"]=tutor_lectures ;
                    }
                    else{
                    data[check_id]["tutor_lectures"]=tutor_lectures ;
                    }
                   
                     update_prmission({ "this": "fast_run_no" }, data[$(this).attr("tid")]["tutor_id"], data[$(this).attr("tid")]["tutor_lectures"]);
                }
                $(".dialog_box").css("display", "block");
            });


            function update_prmission(formData, tid = "", lectures = "") {
                $.ajax({
                    url: '../conn/manage_tutors.php',
                    type: 'POST',
                    data: JSON.stringify(formData),
                    success: function (json) {
                        if (formData["this"] == "fast_run_no") {
                            var data = JSON.parse(json);
                            var add_checkbox = "";
                            add_checkbox = "<span class='chkbx_itsnames_div'>";
                            var i = 0;
                            var modify_lectures = lectures.split(",");
                            data.forEach((val) => {
                                if (modify_lectures.includes(val["course_name"])) {
                                    add_checkbox += "<input type='checkbox' name='lectures_chkbox' id=lectures_chkbox" + i + " class='lectures_chkboxes' value=" + val["course_name"] + " checked></input><label for=lectures_chkbox" + i + " class='lbl_name' >" + val["course_name"] + "</label>";
                                }
                                else {
                                    add_checkbox += "<input type='checkbox' name='lectures_chkbox' id=lectures_chkbox" + i + " class='lectures_chkboxes' value=" + val["course_name"] + "></input><label for=lectures_chkbox" + i + " class='lbl_name' >" + val["course_name"] + "</label>";
                                }
                                i++;
                            })
                            add_checkbox += "</span>";
                            $(".dialog_box_content").append(add_checkbox);
                            $("#save_btn").click(function (e) {
                                e.preventDefault();
                                e.stopPropagation();
                                var collect = new Array();
                                for (var j = 0; j <= data.length; j++) {
                                    if ($("#lectures_chkbox" + j).is(":checked")) {
                                        collect.push($("#lectures_chkbox" + j).val());
                                    }
                                }

                                var join = collect.join(",");
                                tutor_lectures = join;
                                var formData = { "this": "go_run", join, tid };
                                // console.log(JSON.stringify(formData));
                                $.ajax({
                                    url: '../conn/manage_tutors.php',
                                    type: 'POST',
                                    data: JSON.stringify(formData),
                                    success: function (json) {
                                        $(".message_display").addClass("success_message");
                                        $(".message").text("Lectures have been saved");
                                        $(".message_display").show();
                                        var stopTime = setTimeout(() => {
                                            $('.close_massage').click();
                                        }, 2000);
                                        $('.close_massage').click(function (e) {
                                            e.stopPropagation();
                                            $(".message_display").hide();
                                            if ($(".message_display").hasClass("success_message")) {
                                                $(".message_display").removeClass("success_message");
                                            }

                                        });
                                    }
                                });
                            });
                        }

                    }
                });
            }
        }

    });

});