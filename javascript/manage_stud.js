$(document).ready(function () {
        var formData = {"this" : "norun"};
        $.ajax({
            url: '../conn/manage_stud.php',
            type: 'POST',
            data: JSON.stringify(formData),
            success: function (json) {
                var data = JSON.parse(json);
                var keys = Object.keys(data);
                var i=0; 
                data.forEach((val) => {
                    if(val['stu_varified'] != ""){
                        $("table").append("<tr><td class='table_td' tid="+keys[i]+">"+val['stu_first_name']+"</td><td><input type='checkbox' name='checkbox' value="+keys[i]+" checked></td></tr>");
                    }
                  else{
                        $("table").append("<tr><td class='table_td' tid="+keys[i]+">"+val['stu_first_name']+"</td><td><input type='checkbox' name='checkbox' value="+keys[i]+"></td></tr>");
                    }
                    i++;
                });
                 $("td[class='table_td']").click(function (e) {
                   var name = data[$(this).attr("tid")]["stu_first_name"]+' '+data[$(this).attr("tid")]["stu_last_name"]; 
                   var contact = data[$(this).attr("tid")]["stu_mobile"]; 
                   var education = data[$(this).attr("tid")]["stu_education"]; 
                   var formData = {"this" : "run" ,"tid" :data[$(this).attr("tid")]["id"]};
                   $.ajax({
                    url: '../conn/manage_stud.php',
                    type: 'POST',
                    data: JSON.stringify(formData),
                    success: function (json) {
                        var datafind = JSON.parse(json);
                        var keysfind = Object.keys(datafind);
                        if(datafind.length >= 1){
                            $('#uenrolled').text(datafind[keysfind]["stu_course_names"]);
                            }
                        else{
                            $('#uenrolled').text('');
                        }
                    }
                });

                $('#uname').text(name);
                $('#ucontact').text(contact);
                $('#ueducation').text(education);
               
                });
                $("input[type='checkbox']").change(function (e) {
                    if($(this).is(":checked")){
                        update_prmission({"this":"fast_run","data":"yes" ,"tid":data[$(this).attr("value")]["id"]});
                    }
                    else{
                        update_prmission({"this":"fast_run","data":"" ,"tid":data[$(this).attr("value")]["id"]});
                    }
             
                });

                function update_prmission(formData){
                    $.ajax({
                        url: '../conn/manage_stud.php',
                        type: 'POST',
                        data: JSON.stringify(formData),
                        success: function (json) {
                        }
                    });
                }

            }

        });

});