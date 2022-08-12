<?php 
header('Content-type: application/json');
function response($status,$message,&$data=null){
    header("HTTP/1.1 ".$status);
    $response['status'] = $status;
    $response['message'] = $message;
    if ($data != null) $response['data'] = $data;
    echo json_encode($response);
}
error_reporting(0); 
if ($_SERVER['REQUEST_METHOD']=='GET'){
    $key = $_GET['key'];
    if (empty(trim($key))) {
        response(400, 'API key cannot be empty');
        exit();
    }
    if ($key != 'keygoeshere') {
        response(400, 'Incorrect credentials');
        exit();
    }
    $email = $_GET['email'];
    if (empty(trim($email))){
        response(400, 'Email cannot be empty');
        exit();
    }
    $data = [];
    $data['email'] = $email;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) $data['valid_format'] = true;
    else {
        $data['valid_format'] = false;
        $data['result'] = 'invalid format';
    }
    
    response(200, 'OK', $data);
}