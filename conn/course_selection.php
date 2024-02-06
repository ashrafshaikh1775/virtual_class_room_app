<?php
session_start();
include("conn.php");
$data = json_decode(file_get_contents("php://input"), true);
if(isset($data["this"])){
if($data["this"] == "norun"){
    $where = 'stu_courses_id = '.$_SESSION["response"][0]["id"];
    $response = $cnn->select("students_course","stu_course_id",null, $where, null,null);
    if (count($response) >= 1) {
        echo json_encode(array("message"=>"Wait For Verification"));
    }
    else{
        echo json_encode(array("message"=>""));
    }
    exit();
}
}
else{
if (count($data) < 1) {
    echo json_encode(array("message"=>"Select Atleast One Course"));
    exit();
}
$str='';
foreach($data as $value){
$str.=",".$cnn->mysqli->real_escape_string($value['value']);
}
$str= ltrim($str , ","); 
$response = $cnn->insert("students_course", ["stu_course_names"=>$str,"stu_courses_id"=> $_SESSION["response"][0]["id"]],null);
 $result = json_decode($response, true);
if($result['message'] == "Registered")
{
    $id=$_SESSION["response"][0]["id"];
    $response = $cnn->update('student_tbl', array("stu_course_page"=>"yes"),  "id = " . "'$id'");
    // $_SESSION["wait"]="wait till verification";
    echo json_encode(["message"=>"status 200","wait_message"=>"Courses are submited"]);
}
else
{
    echo json_encode(["message"=>"status 400"]);
}
}


