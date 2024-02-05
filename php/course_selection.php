<?php
session_start();
// echo $_SESSION["response"][0]["stu_first_name"];
// echo $_SESSION["log_in"];
// echo "<h1>Student Dashboard</h1>";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>school_management_system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/course_selection.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <form id="course_form">
    <div class="message_display">
                <div class="message"></div>
                <div class="close_massage">&#10006</div>
            </div>
        <div class="course_form_outer_div">
            <table>
                <tr>
                    <th>Course Name</th>
                    <th> Select Course</th>
                </tr>
                <tr>
                    <td>Css</td>
                    <td><input type="checkbox" name="checkbox" value="css"></td>
                </tr>
                <tr>
                    <td>Html</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>php</td>
                    <td><input type="checkbox" name="checkbox" value="php"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="java"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="java"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
                <tr>
                    <td>java</td>
                    <td><input type="checkbox" name="checkbox" value="html"></td>
                </tr>
            </table>
        </div>
        <input type='submit' value="Enroll" name="enroll" id="enroll"></input>
    </form>


    <script type="text/javascript" src='../javascript/course_selection.js'></script>
</body>

</html>