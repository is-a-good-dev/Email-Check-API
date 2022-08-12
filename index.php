<?php 
header('Content-type: application/json');
function json_response($status,$message,&$data=null){
    header("HTTP/1.1 ".$status);
    $response['status'] = $status;
    $response['message'] = $message;
    if ($data != null) $response['data'] = $data;
    echo json_encode($response);
}
error_reporting(0); 
if ($_SERVER['REQUEST_METHOD']=='GET'){
    $key = $_GET['key'];
    if (empty(trim($key))) json_response(400, 'API key cannot be empty');

}