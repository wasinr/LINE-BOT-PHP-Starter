<?php
$access_token = 'ZGYSJocgYshjoHOifvNFce53+Td1z/m45usGYwgCcWE9MJCzmlRqSGjo6vmUVFuZj6YhEqN7SNsX1IOF3QxcE9jdBwZlIEuoo2Aljq8UJV587vL0QstssWvwqJRcRjkgSwAU1M1lrBeVX6RT1fu5HwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;