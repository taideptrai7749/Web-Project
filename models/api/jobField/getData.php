<?php
    require_once("../../jobFieldDB.php");
    $job_field_db = new JobFieldDB();
    header("Content-Type: application/json; charset=utf-8");

    if($_SERVER['REQUEST_METHOD'] != 'GET'){
        http_response_code(405);
        die(json_encode(array("status" => false, "error" => "This API only support POST method")));
    }
    $res = $job_field_db->get_fields_data();

    if($res['code']!=0){
        http_response_code(500);
        die(json_encode(array("status"=> false, "error" => $res['error'])));
    }
    die(json_encode(array("status"=> true, "data" => $res['data'])));
?>