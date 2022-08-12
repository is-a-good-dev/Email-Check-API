<?php
header('Content-type: application/json');
function response($message, $status, &$data = null){
    header("HTTP/1.1 ".$status);
    $response['status'] = $status;
    $response['message'] = $message;
    if ($data!=null) $response['data'] = $data;
    echo json_encode($response);
}
error_reporting(0); 
if ($_SERVER['REQUEST_METHOD']=='GET'){
    if (!isset($_GET['action'])) response('Ok',200);
    if (isset($_GET['action'])){
        if (empty(trim($_GET['action']))){
            response('That cant be empty',400);
            exit();
        }
    }
    if ($_GET['action'] == 'testres'){
        $data = [];
        $data['email'] = 'johndoe@example.com';
        $data['domain'] = 'example.com';
        $data['domain_data']['valid_format'] = true;
        $data['domain_data']['mx_records'] = true;
        $data['domain_data']['disposable'] = false;
        $data['valid'] = true;
        response("Example response", 200, $data);
    }
}