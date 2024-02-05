<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>school_management_system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="form_outer_div register_outer_class">
        <form id="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
            <div class="login_form_inner_div1">
                <label for='first_name' class="labels first_lbl">First Name</label>
                <label for='last_name' class="labels last_lbl">Last Name</label></br>
                <input type="text" name="first_name" id="first_name" required></input>
                <input type="text" name="last_name" id="last_name" required></input>
            </div>

            <div class="login_form_inner_div1">
                <label for='user_email' class="labels">Email</label></br>
                <input type="email"  name="user_email" id="user_email" required></input>
            </div>

            <div class="login_form_inner_div1">
                <label for='user_pass' class="labels">Password</label></br>
                <input type="password" name="user_pass" id="user_pass" required maxlength="8"></input>
            </div>

            <div class="login_form_inner_div1">
                <label for='user_mobile' class="labels">Mobile</label></br>
                <input type="text" name="user_mobile" id="user_mobile" required maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></input>
            </div>

            <div class="login_form_inner_div1">
                <label for='user_address' class="labels">Address</label></br>
                <input type="text" name="user_address" id="user_address" required></input>
            </div>
            <div class="login_form_inner_div1">
                <label for='user_education' class="labels">Education / Qualification</label></br>
                <select name="user_education" id="user_education" required>
                    <option value="Select" disabled selected>Select</option>
                    <option value="Masters">Masters</option>
                    <option value="Bachelors">Bachelors</option>
                    <option value="12th">12th</option>
                    <option value="10th">10th</option>
                    <option value="Below 10th">Below 10th</option>
                </select>
            </div>

            <div class="login_form_inner_div1">
                <input type="radio" name="gender" id="male" value='male'></input>
                <label for='male' class="labels">Male</label>
                <input type="radio" name="gender" id="female" value='female'></input>
                <label for='female' class="labels">Female</label>
                <input type="radio" name="gender" id="other" value='other'></input>
                <label for='other' class="labels">Other</label>
            </div>
            <div class="login_form_inner_div1 register_form_inner_div2">
                <input type="radio" name="group" id="student" value='student'></input>
                <label for='student' class="labels">Student</label>
                <input type="radio" name="group" id="tutor" value='tutor'></input>
                <label for='tutor' class="labels">Tutor</label>
            </div>
            <input type="submit" id="submit" class="register_submit"></input>
            <a href="../" id="registration_link">Login Here</a>
        <div class="message_display">
        <div class="message"></div>
        <div class="close_massage">&#10006</div>
        </div>
        </form>
    </div>
    <script type="text/javascript" src='../javascript/register.js'></script>
</body>

</html>