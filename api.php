<?php
class response {
    public string $message;
    public int $status;
    public mixed $data;

    public function __construct ($message, $status, $data) {
        $this->message = $message; 
        $this->status = $status;
        $this->data = $data;

    }
}

class data {
    public mixed $return_data;

    public function __construct (mixed $return_data = null) {

        $this->return = $return_data;

    }
    public function mx (string $validate) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) $validate = substr(strrchr($email, "@"), 1);

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