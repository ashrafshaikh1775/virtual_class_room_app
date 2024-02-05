<?php
session_start();
include("conn.php");
$data = json_decode(file_get_contents("php://input"), true);
if (count($data) != 3) {
    echo json_encode(array("message" => "All Fields are Required"));
    exit();
}
$email = $cnn->mysqli->real_escape_string(filter_var($data[0]['value'], FILTER_SANITIZE_EMAIL));
$pass = $cnn->mysqli->real_escape_string($data[1]['value']);
$role = $cnn->mysqli->real_escape_string($data[2]['value']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array("message" => "Invalid Email Id"));
} elseif ($pass == '' || strlen($pass) > 8) {
    echo json_encode(array("message" => "Password is reqiured"));
} elseif ($role == '') {
    echo json_encode(array("message" => "Role is required"));
} else {
    if ($role == 'student') {
        $response = $cnn->select('student_tbl', $rows = 'id , stu_first_name, stu_email , stu_pass , stu_role , stu_varified , stu_course_page', null, "stu_email = " . "'$email'" . ' And stu_pass = ' . "'$pass'", null, null);
    } elseif ($role == 'tutor') {
        $cnn->select('student_tbl', $rows = 'tutor_email , tutor_passsword , tutor_role', null, "tutor_email = " . "'$email'" . ' And tutor_passsword = ' . "'$pass'", null, null);
    } elseif ($role == 'admin') {
        // $cnn->select('tutor_tbl', $rows = '*',null, $where = null, null,null);
    } else {
        echo json_encode(array("message" => "Something went wrong!!"));
        exit();
    }
  
    if (count($response) >= 1) {
        $_SESSION["response"]=$response;
        $_SESSION["log_in"]='log_in';
        if ($response[0]["stu_varified"] == '') {
            echo json_encode(array("message" => "status 400"));
        } else {
            echo json_encode(array("message" => "status 200","value"=>$response[0]["stu_course_page"]));
        }
    } else {
        echo json_encode(array("message" => "Incorrect Email Or Password"));
    }
}
