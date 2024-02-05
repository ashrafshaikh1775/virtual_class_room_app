<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>school_management_system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/student_dashboard.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <span>Name : <?php echo $_SESSION["response"][0]["stu_first_name"]; ?></span>
        <span>Email : <?php echo $_SESSION["response"][0]["stu_email"]; ?></span>
        <span>Logout</span>
    </header>
    <div class="student_dashboard_div">
        <form id="student_dashboard_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
            <div class="video_player_div">
                <video class="vidoe_player" controls>
                    <source src="movie.mp4" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                </video>
                <div class="small_video_div">
                    <video class="small_vidoe_player" controls>
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                    </video>
                </div>
            </div>
            <div class=student_dashboard_table_div>
                <div class=student_dashboard_course_section>
                    <input type="submit" class="submit" value="html"></input>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src='../javascript/student_dashboard.js'></script>
</body>

</html>