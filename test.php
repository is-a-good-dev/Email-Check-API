<?php
header('Content-type: application/json');
function response($message, $status){
    header("HTTP/1.1 ".$status);
    $response['status'] = $status;
    $response['message'] = $message;
    echo json_encode($response);
}
response('Ok',200);