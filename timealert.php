<?php
include('config.php');
include('condb.php');
$datenow = date("j/n/Y");
$timenow = date("G:i");
if ($timenow <= '12:05') {
    // $sql = "SELECT * FROM student";
    $sql = "SELECT * FROM student where stuid not in (SELECT distinct UID FROM time_emp where SUBSTRING_INDEX(DateTime , ' ',1)='$datenow')";
    $res = mysqli_query($conn, $sql);
    // $data = mysqli_fetch_array($res);
    // echo $data['DateTime'];

    // 
    // $count;
    foreach ($res as $data1) {
        $id = $data1['userid'];
        // echo $id;
        // echo '<br>';

        alert($id);
    }
} else if ($timenow >= '12.50') {
    $sql = "SELECT * FROM student where stuid not in (
        SELECT distinct UID as TIME FROM time_emp 
        where SUBSTRING_INDEX(DateTime , ' ',1) = '$datenow' and REVERSE(SUBSTRING_INDEX(REVERSE(DateTime), ' ',1)) < '17:55')";
    $res = mysqli_query($conn, $sql);
    foreach ($res as $data1) {
        $id = $data1['userid'];
        // echo $id;
        // echo '<br>';

        alert($id);
    }
}






function alert($id)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.line.me/v2/bot/message/push",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\r\n    \"to\": \"$id\",\r\n    \"messages\": [\r\n        {\r\n            \"type\": \"flex\",\r\n            \"altText\": \"Flex Message\",\r\n            \"contents\": {\r\n                \"type\": \"bubble\",\r\n                \"direction\": \"ltr\",\r\n                \"header\": {\r\n                    \"type\": \"box\",\r\n                    \"layout\": \"vertical\",\r\n                    \"backgroundColor\": \"#FF232375\",\r\n                    \"contents\": [\r\n                        {\r\n                            \"type\": \"text\",\r\n                            \"text\": \"Checkin-out\",\r\n                            \"weight\": \"bold\",\r\n                            \"color\": \"#000000CE\",\r\n                            \"align\": \"center\",\r\n                            \"contents\": []\r\n                        }\r\n                    ]\r\n                },\r\n                \"hero\": {\r\n                    \"type\": \"image\",\r\n                    \"url\": \"https://pbs.twimg.com/media/EiZ-uaGU0AEa_Y-.jpg\",\r\n                    \"size\": \"full\",\r\n                    \"aspectRatio\": \"1.51:1\",\r\n                    \"aspectMode\": \"fit\",\r\n                    \"backgroundColor\": \"#00FFC8FF\"\r\n                },\r\n                \"body\": {\r\n                    \"type\": \"box\",\r\n                    \"layout\": \"vertical\",\r\n                    \"backgroundColor\": \"#00FFC8FF\",\r\n                    \"contents\": [\r\n                        {\r\n                            \"type\": \"text\",\r\n                            \"text\": \"อย่าลืมลงบันทึกเวลาทำงานด้วยครับ\",\r\n                            \"weight\": \"bold\",\r\n                            \"align\": \"center\",\r\n                            \"gravity\": \"center\",\r\n                            \"contents\": []\r\n                        }\r\n                    ]\r\n                },\r\n                \"footer\": {\r\n                    \"type\": \"box\",\r\n                    \"layout\": \"horizontal\",\r\n                    \"backgroundColor\": \"#00D3FA56\",\r\n                    \"contents\": [\r\n                        {\r\n                            \"type\": \"button\",\r\n                            \"action\": {\r\n                                \"type\": \"uri\",\r\n                                \"label\": \"จิ้มเบาๆเพื่อลงเวลา\",\r\n                                \"uri\": \"https://liff.line.me/1654474033-wYMyONgd\"\r\n                            },\r\n                            \"color\": \"#FF91009E\"\r\n                        }\r\n                    ]\r\n                }\r\n            }\r\n        }\r\n    ]\r\n}",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer Ybt8pl9LynUdSvMIcSlQiEvG+ZcXCHL2PEkhhgQ7HUm0JlSdS0t6N+3X5IxG4l21xjMqgpZlXGcv+yV6PathA4ppGc7RQdrjX/vvQZ7E6aURroy04yeUM4zbmJ2h+PdCByvFcAsEhDSf85m9YdsLMwdB04t89/1O/w1cDnyilFU=",
            "Content-Type: application/json"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
}
