<?php
include("conn.php");
$data = json_decode(file_get_contents("php://input"), true);
if (count($data) != 9) {
    echo json_encode(array("message"=>"All Fields are Required"));
    exit();
}
$fname = $cnn->mysqli->real_escape_string($data[0]['value']);
$lname = $cnn->mysqli->real_escape_string($data[1]['value']);
$email = $cnn->mysqli->real_escape_string(filter_var($data[2]['value'], FILTER_SANITIZE_EMAIL));
$pass = $cnn->mysqli->real_escape_string($data[3]['value']);
$mobile = $cnn->mysqli->real_escape_string($data[4]['value']);
$address = $cnn->mysqli->real_escape_string($data[5]['value']);
$education = $cnn->mysqli->real_escape_string($data[6]['value']);
$gender = $cnn->mysqli->real_escape_string($data[7]['value']);
$role = $cnn->mysqli->real_escape_string($data[8]['value']);

if ($fname == '') {
   echo json_encode(array("message"=>"First Name is required"));
} elseif ($lname == '') {
    echo json_encode(array("message"=>"Last Name is required"));
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array("message"=>"Invalid Email Id"));
} elseif ($pass == '' || strlen($pass) > 8) {
    echo json_encode(array("message"=>"Password is reqiured"));
} elseif (strlen($mobile) != 10 || !is_numeric($mobile)) {
    echo json_encode(array("message"=>"Invalid Mobile Number"));
} elseif ($address == '') {
    echo json_encode(array("message"=>"Address is required"));
} elseif ($education == 'select') {
    echo json_encode(array("message"=>"Education / Qualification is required"));
} elseif ($gender == '') {
    echo json_encode(array("message"=>"Gender is required"));
} elseif ($role == '') {
    echo json_encode(array("message"=>"Role is required"));
} else {
    $arr = [];
    $col_name=[];
    $col_value=[];
    if($role == 'student')
    {
        $col_name = array("stu_first_name", "stu_last_name", "stu_email", "stu_pass", "stu_mobile", "stu_address", "stu_education", "stu_gender", "stu_role");
    }
    elseif($role == 'tutor'){
        $col_name = array("tutor_first_name", "tutor_last_name", "tutor_email", "tutor_password", "tutor_mobile", "tutor_address", "tutor_qualification", "tutor_gender", "tutor_role");
    }
   
    $col_value = array($fname, $lname, $email, $pass, $mobile, $address, $education, $gender, $role);
    for ($i = 0; $i < count($col_name); $i++) {
        $arr[$col_name[$i]] = $col_value[$i];
    }
    if($role == 'student')
    {
     $jsonData = $cnn->insert('student_tbl',$arr, null);
     echo $jsonData;
    }
    elseif($role == 'tutor')
    {
     $jsonData = $cnn->insert('tutor_tbl',$arr, null);
     echo $jsonData;
    }
    else{
        echo json_encode(array("message"=>"Something went wrong!!"));
    }
    
    
}

