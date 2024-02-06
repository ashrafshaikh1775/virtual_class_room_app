<?php
// session_start();
include("conn.php");
$data = json_decode(file_get_contents("php://input"), true);
$cols ='';
$joins ='' ;
$where ='' ;
$table_name='';
if($data["this"] == 'run'){
    $table_name="students_course";
    $cols = "stu_course_names";
    $joins = null;
     $where = 'stu_courses_id = '.$data["tid"];
}
else if($data["this"] == 'norun')
{
    $table_name="student_tbl";
    $cols = "*";
    $where = null;
}
else{
    if($data["data"]!=''){
        $send='yes';
    }
    else
    {
        $send='';
    }
    $response = $cnn->update("student_tbl", array("stu_varified"=>$send), "id = ".$data["tid"]);
    $result = json_encode($response);
    print_r($result);
}
if($data["this"] != 'fast_run'){
    $response = $cnn->select($table_name, $cols,null, $where, null,null);
    $result = json_encode($response);
    print_r($result);
}