<?php
require_once('./line_class.php');
$channelAccessToken = 'MNt6FGRmt+ESXa5UGmjKss/wccOI2ckP/I2Y3EXeRC8joAxfcyhIs/hPACvNNhAi6D9sPg8K74OnslPFAQo71QNQZiO2U9InYmsovD02eNpxuwVAicKZhY7InCbx/2sJvCkYLWIzsFRKHG0mB1GduQdB04t89/1O/w1cDnyilFU=
'; //Channel access token
$channelSecret = '51d48d6d030cea18cc66f016a65bb2aa';//Channel secret

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
