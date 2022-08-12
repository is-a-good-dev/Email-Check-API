<?php
var_dump( dns_get_record('wclarke.dev',DNS_MX));

$mx_record = [];
$mx_record['record'] = $dns[0]['target'];
$mx_record['ttl'] = $dns[0]['ttl'];
$mx_record['pri'] = $dns[0]['pri'];
//echo "<br>" . $mx_record['ttl'];
//var_dump(dns_get_record('google.com', DNS_NS));
//echo "<br>". checkdnsrr('wclarke.dev','MX'); // How many mx records 
echo "<br>";


// Put all mx records into array
$dns = dns_get_record('wclarke.dev',DNS_MX);
$count = count($dns);
echo $count;
$i = 0;
$record = array();
while ($i < $count) {
    array_push($record, $dns[$i]['target']);
    $i++;
}
echo "<br>";
var_dump($record);