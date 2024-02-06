<?php

$allowed_countries = array("CA"); // allowed countries codes e.g: EG,TN,US,SA

$ip = $_SERVER["REMOTE_ADDR"]; // get the visitor ip
function get_ip_country(){
    global $ip;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"http://ip-api.com/json/".$ip);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    return json_decode(curl_exec($ch))->countryCode;
}

if(!in_array(get_ip_country(),$allowed_countries)){
    header("Location: https://google.com");
    die();
}


?>