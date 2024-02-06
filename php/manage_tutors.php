<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        .button_css {
            width: 50%;
            height: 40px;
            position: relative;
            top: 20px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            background-color: rgb(98, 98, 230);
            color: white;
            font-size: 20px;
        }

        #login_form {
            width: 100%;
            height: 100%;
            position: relative;
            top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            row-gap: 10px;
        }

        label {
            font-size: 20px;
        }

        .other_students {
            width: 100%;
            height: 60%;
            display: flex;
            flex-direction: column;
            overflow-x: auto;
        }

        table {
            width: 100%;
            position: relative;
            border-collapse: collapse;
        }

        table th {

            background-color: #b9cf38c9;
        }

        table td {
            text-align: center;
            cursor: pointer;
        }

        input[type="checkbox"] {
            cursor: pointer;
            width: 18px;
            height: 18px;
        }

        #uenrolled {
            width: 80%;
            font-size: 20px;
        }

        .add_lectures {
            width: 70%;
            height: 20px;
            background-color: #1f6b37;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-weight: bold;
        }

        .dialog_box {
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0);
            position: absolute;
            top: 0px;
            z-index: 1;
            cursor: pointer;
            display: none;
        }

        .dialog_box_data {
            background-color: whitesmoke;
            width: 400px;
            position: relative;
            top: calc((100% - 80%) / 2);
            left: calc((100% - 400px) / 2);
            height: calc(100% - 20%);
            border-radius: 20px;
        }

        .dialog_box_close {
            width: 40px;
            height: 40px;
            position: relative;
            left: 90%;
            top: 0px;
            font-size: 25px;
            text-align: center;
            /* background-color: wheat; */
        }

        .dialog_box_heading,
        .dialog_box_heading_name {
            width: 90%;
            height: 40px;
            text-align: center;
            font-size: 25px;
            line-height: 50px;
            position: relative;
            top: -40px;
            font-weight: bold;
            /* background-color: #1f6b37; */
        }

        .dialog_box_heading_name {
            width: 100%;
            height: 25px;
            line-height: 25px;
            top: -20px;
            font-size: 20px;
            background-color: #1f6b37;
            color: white;
        }

        .dialog_box_content {
            width: 100%;
            height: 60%;
            position: relative;
            top: -10px;
            overflow-x: auto;
        }

        .chkbx_itsnames_div {
            display: grid;
            grid-template-columns: 0.2fr 1fr 0.2fr 1fr 0.2fr 1fr;
            row-gap: 5px;
        }

        .lbl_name {
            cursor: pointer;
            font-size: 15px;
        }

        .chkbx_itsnames_div {
            cursor: pointer;
        }

        #save_btn {
            width: 22%;
            height: 40px;
            position: relative;
            left: calc((100% - 20%) / 2);
            background-color: #1f6b37;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
        }
        .message_display{
            position: relative;
            top: 20px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="form_outer_div">
        <form id="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
            <h2>Manage Tutors</h2>
            <div class="user_data">
                <label id="name">Name :</label>
                <label id="uname"></label></br>
                <label id="contact">Contact :</label>
                <label id="ucontact"></label></br>
                <label id="education">Education :</label>
                <label id="ueducation"></label></br>
                <label id="enrolled">Enrolled :</label>
                <label id="uenrolled"></label>
            </div>
            <div class="other_students">
                <table id="table">
                    <tr>
                        <th>Tutor Name</th>
                        <th>Permission</th>
                        <th>Lectures</th>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <div class="dialog_box">
        <div class="dialog_box_data">
            <div class="dialog_box_close">&#10006</div>
            <header class="dialog_box_heading">Add Lectures</header>
            <header class="dialog_box_heading_name">Add Lectures</header>
            <div class="dialog_box_content"></div>
            <input type="submit" id="save_btn"></input>
            <div class="message_display">
                <div class="message"></div>
                <div class="close_massage">&#10006</div>
            </div>
        </div>

    </div>
    </div>
    <script type="text/javascript" src='../javascript/manage_tutors.js'></script>
</body>

</html>