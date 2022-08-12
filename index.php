<?php 
require 'vendor/autoload.php';
use ElliotJReed\DisposableEmail\DisposableEmail;
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
    $domain = substr(strrchr($email, "@"), 1);
    $data['domain'] =  $domain;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) $data['domain_data']['valid_format'] = true;
    else $data['domain_data']['valid_format'] = false;
    if ($data['domain_data']['valid_format']) {
        if (DisposableEmail::isDisposable($email)) $data['domain_data']['disposable_email'] = true;
        $data['domain_data']['disposable_email'] = false;
    }
    $dns_data = dns_get_record($domain,DNS_MX);
    //echo $domain;
    $arr_len = count($dns_data);
    $data['domain_data']['mx_record_count'] = $arr_len;
    $i = 0;
    $data['domain_data']['mx_records'] = array();
    while ($i < $arr_len) {
        array_push($data['domain_data']['mx_records'], $dns_data[$i]['target']);
        $i++;
    }
    //var_dump($data['domain_data']['mx_records']);

    
    response(200, 'OK', $data);
}