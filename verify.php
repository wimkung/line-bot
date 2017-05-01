<?php
$access_token = '1PJqZhAv5RWER6iN7UmlY7pAP7Rv3HZtRXaMFgJewfnsx+qCXCIpV/YAI9mlcJ97tvu3cMvy4z/9cQZa0C8RCgey/yDYQP1VDYh2a7m/yCairQwOWnECaXm+zVvtFr3DhXX75BI5hIlZ6DY5QTE/PwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
