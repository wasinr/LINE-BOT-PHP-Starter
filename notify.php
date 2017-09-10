<?php
define('LINE_API',"https://notify-api.line.me/api/notify");

$token = "iHgwS5dOJDGgDOc7KZiHsoI8ugjH2mwEAU7DjrsrN9I"; //ใส่Token ที่copy เอาไว้
$str = "สวัสดี"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

//$res = notify_message($str, $token);
//$res = notify_sticker("ทดสอบสติ๊กเกอร์", 1, 7, $token);
$res = notify_image("ทดสอบรูปภาพ", "http://photos2.insidercdn.com/iphone4scamera-111004-full.JPG");
print_r($res);


function notify_message($message, $token){

  $queryData = array('message' => $message);

  $queryData = http_build_query($queryData, '', '&');
  $headerOptions = array( 
    'http'=>array(
      'method'=>'POST',
      'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
      ."Authorization: Bearer ".$token."\r\n"
      ."Content-Length: ".strlen($queryData)."\r\n",
      'content' => $queryData
    ),
  );
  $context = stream_context_create($headerOptions);
  $result = file_get_contents(LINE_API, FALSE, $context);
  $res = json_decode($result);


  return $res;
}

function notify_sticker($message, $stickerPkg, $stickerId, $token){
  $queryData = array(
    'message' => $message,
    'stickerPackageId'=>$stickerPkg,
    'stickerId'=>$stickerId
  );
  $queryData = http_build_query($queryData, '', '&');
  
  $headerOptions = array(
    'http'=>array(
      'method'=>'POST',
      'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
      ."Authorization: Bearer ".$token."\r\n"
      ."Content-Length: ".strlen($queryData)."\r\n",
      'content' => $queryData
    ),
  );
  $context = stream_context_create($headerOptions);
  $result = file_get_contents(LINE_API, FALSE, $context);
  $res = json_decode($result);
  return $res;
}

function notify_image($message, $imageFile, $token){
  $queryData = array(
    'message' => $message,
    'imageFile'=>$imageFile
  );
  $queryData = http_build_query($queryData, '', '&');
  
  $headerOptions = array(
    'http'=>array(
      'method'=>'POST',
      'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
      ."Authorization: Bearer ".$token."\r\n"
      ."Content-Length: ".strlen($queryData)."\r\n",
      'content' => $queryData
    ),
  );
  $context = stream_context_create($headerOptions);
  $result = file_get_contents(LINE_API, FALSE, $context);
  $res = json_decode($result);
  return $res;
}