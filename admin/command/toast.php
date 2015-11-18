<?php
function toastup($channel,$message){
	$channel_uri = urldecode($channel);
	$toast_xml = 
	'<?xml version="1.0" encoding="utf-8" ?>
		<wp:Notification xmlns:wp="WPNotification">
			<wp:Toast>
				<wp:Text1>'.信息：.'</wp:Text1>
				<wp:Text2>'.$message.'</wp:Text2>
			</wp:Toast>
		</wp:Notification>';
	$headers = array('Content-Type: text/xml', 
		"Content-Length: " . strlen($toast_xml), 
		"X-WindowsPhone-Target: toast", 
		"X-NotificationClass: 2");
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$channel_uri);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 2);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "$toast_xml");
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	$response = curl_getinfo($ch);
	curl_close($ch);
	return $response['http_code'];
}