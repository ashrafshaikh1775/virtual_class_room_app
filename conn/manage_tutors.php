<?php
include("conn.php");
$data = json_decode(file_get_contents("php://input"), true);
$cols ='';
$where ='' ;
$table_name='';
if($data["this"] == 'run'){
    // $table_name="students_course";
    // $cols = "stu_course_names";
    // $joins = null;
    //  $where = 'stu_courses_id = '.$data["tid"];
}
else if($data["this"] == 'norun')
{
    $table_name="tutor_tbl";
    $cols = "*";
    $where = null;
}
else if($data["this"] == 'fast_run'){
    $table_name="tutor_tbl";
    $cols = "tutor_varified";
    if($data["data"]!=''){
        $send='yes';
    }
    else
    {
        $send="";
    }
}
else if($data["this"] == "fast_run_no"){
    $table_name="course_tbl";
    $cols = "course_name";
    $where = null;
}
else{
    $table_name="tutor_tbl";
    $cols = "tutor_lectures";
    $send=$data["join"];
}
if($data["this"] != 'fast_run' && $data["this"] != 'go_run'){
    $response = $cnn->select($table_name, $cols,null, $where, null,null);
    $result = json_encode($response);
    print_r($result);
}
else
{
    $response = $cnn->update($table_name, array($cols=>$send), "tutor_id = ".$data["tid"]);
    $result = json_encode($response);
    print_r($result);
}