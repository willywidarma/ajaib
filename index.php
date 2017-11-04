<?php
require_once('./line_class.php');
$channelAccessToken = 'pxBUzy4OsuWKpRrD/e5jFcK8OEtQVGGvBdBpVmvVMp/1VPnJtUOtO1gMLZRHqeZWExL2sNflyJhM6egb9Ux9yqooa97r6JN70AnCXczw2mrv3341R78u527minnq7WXaWlXHHWZtZfGc44ercqWrhAdB04t89/1O/w1cDnyilFU='; //Channel access token
$channelSecret = 'c25489edf621005b7beb16985b6514bc';//Channel secret

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$replyToken = $client->parseEvents()[0]['replyToken'];
$message 	= $client->parseEvents()[0]['message'];
$msg_type = $message['type'];
$botname = "KerangAjaib"; //Nama bot

function send($input, $rt){
    $send = array(
        'replyToken' => $rt,
        'messages' => array(
            array(
                'type' => 'text',					
                'text' => $input
            )
        )
    );
    return($send);
}

function jawabs(){
    $list_jwb = array(
		'Ya',
		'Tidak',
		'Bisa jadi',
		'Mungkin',
		'Tentu tidak',
		'Coba tanya lagi'
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}

if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'apakah') {
        $balas = send(jawabs(), $replyToken);
    } else {}
} else {}

if(isset($balas)){
    $client->replyMessage($balas); 
    $result =  json_encode($balas);
    file_put_contents($botname.'.json',$result);
}
