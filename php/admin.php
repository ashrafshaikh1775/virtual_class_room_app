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
    .button_css{
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
    </style>
</head>

<body>
    <div class="form_outer_div">
        <form id="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
         <h2>Admin Panel</h2>
            <input type="submit" id="submit1" class="button_css" value="Manage_student"></input>
            <input type="submit" id="submit2" class="button_css" value="Manage_tutor"></input>
            <input type="submit" id="submit3" class="button_css" value="Manage_lectures"></input>
        </form>
    </div>
    <script type="text/javascript" src='../javascript/admin.js'></script>
</body>

</html>