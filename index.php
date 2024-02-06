<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>virtual_class_room_app</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="form_outer_div">
        <form id="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
            <div class="login_form_inner_div1">
                <label for='user_login' class="labels">Email</label></br>
                <input type="text" name="user_email" id="user_email"></input>
            </div>
            <div class="login_form_inner_div2">
                <label for='user_pass' class="labels">Password</label></br>
                <input type="password" name="user_pass" id="user_pass"></input>
            </div>
            <div class="login_form_inner_div3">
                <input type="radio" name="group" id="student" value='student'></input>
                <label for='student' class="labels">Student</label>
                <input type="radio" name="group" id="tutor"  value='tutor'></input>
                <label for='tutor' class="labels">Tutor</label>
                <input type="radio" name="group" id="admin" value='admin'></input>
                <label for='admin' class="labels">Admin</label>
            </div>
            <input type="submit" id="submit"></input>
            <a href="php/register.php" id="registration_link">Register Here</a>
            <div class="message_display">
                <div class="message">asdsaasdasd</div>
                <div class="close_massage">&#10006</div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src='javascript/login.js'></script>
</body>

</html>