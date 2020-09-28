<?php
$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'Ybt8pl9LynUdSvMIcSlQiEvG+ZcXCHL2PEkhhgQ7HUm0JlSdS0t6N+3X5IxG4l21xjMqgpZlXGcv+yV6PathA4ppGc7RQdrjX/vvQZ7E6aURroy04yeUM4zbmJ2h+PdCByvFcAsEhDSf85m9YdsLMwdB04t89/1O/w1cDnyilFU=';
$channelSecret = '70534d2a9123eefbb2034dbb24a3b2d0';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array
$userId = $request_array['events'][0]['source']['userId'];
$LINEProfileDatas['url'] = "https://api.line.me/v2/bot/profile/" . $userId;
$LINEProfileDatas['token'] = $ACCESS_TOKEN;
$resultsLineProfile = getLINEProfile($LINEProfileDatas);
$LINEUserProfile = json_decode($resultsLineProfile['message'], true);
$displayImage = $LINEUserProfile['pictureUrl'];

/*Get Data From POST Http Request*/
// $datas = file_get_contents('php://input');
// /*Decode Json From LINE Data Body*/
// $deCode = json_decode($datas, true);

// file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

// $replyToken = $deCode['events'][0]['replyToken'];
// $userId = $deCode['events'][0]['source']['userId'];
// $type = $deCode['events'][0]['type'];

// $token = "Ybt8pl9LynUdSvMIcSlQiEvG+ZcXCHL2PEkhhgQ7HUm0JlSdS0t6N+3X5IxG4l21xjMqgpZlXGcv+yV6PathA4ppGc7RQdrjX/vvQZ7E6aURroy04yeUM4zbmJ2h+PdCByvFcAsEhDSf85m9YdsLMwdB04t89/1O/w1cDnyilFU=";

// $LINEProfileDatas['url'] = "https://api.line.me/v2/bot/profile/" . $userId;
// $LINEProfileDatas['token'] = $token;

// $resultsLineProfile = getLINEProfile($LINEProfileDatas);

// $LINEUserProfile = json_decode($resultsLineProfile['message'], true);
// $displayName = $LINEUserProfile['displayName'];
// $displayImage = $LINEUserProfile['pictureUrl'];

// if ($type == "message") {
// 	$subtype = $deCode['events'][0]['message']['type'];
// 	if ($subtype == "text") {
// 		$text = "คุณพิมพ์ Text นะจ๊ะ";
// 	} else {
// 		$text = "ส่งอะไรมาไม่รู้เรื่อง เดี๋ยวส่งไปคุยกับลุงตู่เลย";
// 	}
// }

// $jsonText = '{
// 	  "type": "text",
// 	  "text": "hgjgj"
// 	}';
// $jsonDecode = json_decode($jsonText, true);
// // $jsonDecode['text'] = "สวัสดีคุณ " . $userId;

// $jsonImage = '{
// 	  "type": "image",
// 	  "originalContentUrl": "https://www.petcitiz.info/wp-content/uploads/2017/11/01-1.jpg",
// 	  "previewImageUrl": "https://www.petcitiz.info/wp-content/uploads/2017/11/01-1.jpg",
// 	  "animated": false
// 	}';
// $jsonDecodeImage = json_decode($jsonImage, true);
// $jsonDecodeImage['originalContentUrl'] = $displayImage;
// $jsonDecodeImage['previewImageUrl'] = $displayImage;
// ============================== ไว้เสิชprofile ================================ \\
include('config.php');
include('condb.php');
$sql = "SELECT * FROM student where userid = '$userId'";
$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($res);

$SID = $data['stuid'];
$name = $data['name_title'] . " " . $data['fname'] . ' ' . $data['lname'];
$faculty = $data['faculty'];
$position = $data['sposition'];
$field = $data['field'];
$semail = $data['semail'];
$sphone = $data['sphone'];
$sposition = $data['sposition'];
$level = $data['level'];
$location_name = $data['location_name'];

$jsonFlex = [
	"type" => "flex",
	"altText" => "Flex Message",
	"contents" => [
		"type" => "bubble",
		"direction" => "ltr",
		"header" => [
			"type" => "box",
			"layout" => "vertical",
			"backgroundColor" => "#08D9F5D3",
			"contents" => [
				[
					"type" => "text",
					"text" => "Profile",
					"align" => "center",
					"gravity" => "center",
					"contents" => []
				]
			]
		],
		"hero" => [
			"type" => "image",
			"url" => "$displayImage",
			"size" => "full",
			"aspectRatio" => "1.51:1",
			"aspectMode" => "fit",
			"backgroundColor" => "#AFF5C8FF"
		],
		"body" => [
			"type" => "box",
			"layout" => "vertical",
			"backgroundColor" => "#AFF5C8FF",
			"contents" => [
				[
					"type" => "text",
					"text" => "รหัสนักศึกษา : " . $SID,
					"contents" => []
				],
				[
					"type" => "text",
					"text" => "ชื่อ : " . $name,
					"align" => "start",
					"contents" => []
				],
				[
					"type" => "text",
					"text" => "คณะ : " . $faculty . " สาขา : " . $field,
					"contents" => []
				],
				[
					"type" => "text",
					"text" => "เบอโทรศัพท์ : " . $sphone,
					"contents" => []
				],
				[
					"type" => "text",
					"text" => "Email : " . $semail,
					"contents" => []
				],
				[
					"type" => "text",
					"text" => "ตำแหน่ง : " . $position,
					"contents" => []
				],
				[
					"type" => "text",
					"text" => "จุดเข้างาน : " . $location_name,
					"contents" => []
				]
			]
		],
		"footer" => [
			"type" => "box",
			"layout" => "horizontal",
			"contents" => [
				[
					"type" => "button",
					"action" => [
						"type" => "uri",
						"label" => "Edit",
						"uri" => "https://liff.line.me/1654474033-1qg3DGMd"
					],
					"color" => "#F7A6A6FF"
				]
			]
		]
	]
];

// $jsonDecodeFlex = json_decode($jsonFlex, true);

// $messages['replyToken'] = $replyToken;
// // $messages['messages'][0] = $jsonDecodeImage;
// // $messages['messages'][1] = $jsonDecode;
// $messages['messages'][2] = $jsonDecodeFlex;
// // $messages['messages'][3] = $jsonDecode;
// // $messages['messages'][4] = $jsonDecode;


// $LINEDatas['url'] = "https://api.line.me/v2/bot/message/push";
// $LINEDatas['token'] = $token;

// $encodeJson = json_encode($messages);

// $results = sentMessage($jsonDecodeFlex, $LINEDatas);


// /*Return HTTP Request 200*/
// http_response_code(200);

// function getFormatTextMessage($text)
// {
// 	$datas = [];
// 	$datas['type'] = 'text';
// 	$datas['text'] = $text;

// 	return $datas;
// }

function getLINEProfile($datas)
{
	$datasReturn = [];

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $datas['url'],
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer " . $datas['token'],
			"Postman-Token: 32d99c7d-9f6e-4413-a4d2-fa0a9f1ecf6d",
			"cache-control: no-cache"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		$datasReturn['result'] = 'E';
		$datasReturn['message'] = $err;
	} else {
		if ($response == "{}") {
			$datasReturn['result'] = 'S';
			$datasReturn['message'] = 'Success';
		} else {
			$datasReturn['result'] = 'E';
			$datasReturn['message'] = $response;
		}
	}

	return $datasReturn;
}

function sentMessage($encodeJson, $datas)
{
	$datasReturn = [];
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $datas['url'],
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $encodeJson,
		CURLOPT_HTTPHEADER => array(
			"authorization: Bearer " . $datas['token'],
			"cache-control: no-cache",
			"content-type: application/json; charset=UTF-8",
		),
	));

	$response = curl_exec($curl);
	// dd($response);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		$datasReturn['result'] = 'E';
		$datasReturn['message'] = $err;
	} else {
		if ($response == "{}") {
			$datasReturn['result'] = 'S';
			$datasReturn['message'] = 'Success';
		} else {
			$datasReturn['result'] = 'E';
			$datasReturn['message'] = $response;
		}
	}

	return $datasReturn;
}


if (sizeof($request_array['events']) > 0) {
	foreach ($request_array['events'] as $event) {
		error_log(json_encode($event));
		$reply_message = '';
		$reply_token = $event['replyToken'];
		// $userMessage = $request_array['events'][0]['message']['text'];
		$userMessage = $request_array['events'][0]['postback']['data'];

		if ($userMessage == "MyProfile") {
			$data = [
				'replyToken' => $reply_token,
				'messages' => [$jsonFlex]
			];
		} else if ($userMessage == "More") {
			checkmenu($userId, "More");
			break;
		} else if ($userMessage == "Back") {
			checkmenu($userId, "Back");
			break;
		}


		print_r($data);

		$post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

		$send_result = send_reply_message($API_URL . '/reply', $POST_HEADER, $post_body);

		echo "Result: " . $send_result . "\r\n";
	}
}

echo "OK";




function send_reply_message($url, $post_header, $post_body)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);

	return $result;
}
function checkmenu($id, $text)
{
	if ($text == "More") {
		$richmenuEmp = 'richmenu-3923e835702e47a286ca4ca52f655aa4';
	} else if ($text == "Back") {
		$richmenuEmp = 'richmenu-e7adf03d78a74618e62307a264221cde';
	}
	$LINEDatas['url'] = "https://api.line.me/v2/bot/user/" . $id . "/richmenu" . "/" . $richmenuEmp;
	$LINEDatas['token'] = "Ybt8pl9LynUdSvMIcSlQiEvG+ZcXCHL2PEkhhgQ7HUm0JlSdS0t6N+3X5IxG4l21xjMqgpZlXGcv+yV6PathA4ppGc7RQdrjX/vvQZ7E6aURroy04yeUM4zbmJ2h+PdCByvFcAsEhDSf85m9YdsLMwdB04t89/1O/w1cDnyilFU=";

	$datas = file_get_contents('php://input');
	$deCode = json_decode($datas, true);
	$messages = '';
	$encodeJson = json_encode($messages);

	$results = change($encodeJson, $LINEDatas);
}

function change($encodeJson, $datas)
{
	$datasReturn = [];
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $datas['url'],
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $encodeJson,
		CURLOPT_HTTPHEADER => array(
			"authorization: Bearer " . $datas['token'],
			"cache-control: no-cache",
			"content-type: application/json; charset=UTF-8",
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);
}
