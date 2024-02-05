<?php
// session_start();
include("conn.php");
$data = json_decode(file_get_contents("php://input"), true);
$cols ='';
$joins ='' ;
$where ='' ;
if($data["this"] == 'run'){
    $cols = "stu_course_names";
    $joins = "students_course ON id = stu_courses_id";
     $where = 'id = '.$data["tid"];
}
else
{
    $cols = "*";
    $joins = null;
    $where = null;
}
$response = $cnn->select('student_tbl', $cols,$joins, $where, null,null);
$result = json_encode($response);
print_r($result);