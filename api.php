<?php
class api {
    public function __construct () {
        header ('Content-type: application/json');
    }
}
class response extends api {
    public string $message;
    public int $status;
    public mixed $data;
    public mixed $response;

    public function __construct (string $message, int $status, mixed $data = null, mixed $response = null) {

        response::responde($message, $status, $data);
    }

    public static function responde ($message, $status, $data = null) {
        header ("HTTP/1.1 ". $this->status);
        
        $this->r = array();
        $this->r['status'] = $this->status;
        $this->r['message'] = $this->message;
        if (isset($this->data)) $this->r['data'] = $this->data;

        echo json_encode($this->r);
    }
}

class validate extends api {
    public mixed $return_data;

    public function __construct (mixed $return_data = null) {

        $this->return = $return_data;

    }

    public function rm_email (string $email) {
        return substr(strrchr($email, "@"), 1);
    }

    public function email (string $email) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) $this->return = true;
        $this->return = false;

    }

    public function mx (string $validate) {

        if (filter_var($validate, FILTER_VALIDATE_EMAIL)) $validate = substr(strrchr($email, "@"), 1);

        $dns = dns_get_record ($validate, DNS_MX);
        
        $mx_records = [];
        foreach ($dns as $i) {
            array_push ($mx_records, $dns[$i]['target']);
        }

        $this->return = $mx_records;
    }

    public function __destruct() {

        if (isset($this->return)) return $this->return;

    }
}