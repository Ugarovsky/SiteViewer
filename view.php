<?php
$url = 'http://kaip-numesti-svorio-su-lieknejimui-lt.blogspot.com/2013/03/lieknejimas-sportuojant-namuose-kaip.html';
$cookie = tmpfile();
$userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31' ;

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
$response = str_ireplace('<head>', "<head><base href=\"$url\" />", $response);
echo $response;

$options = array(
CURLOPT_CONNECTTIMEOUT => 20 ,
CURLOPT_USERAGENT => $userAgent,
CURLOPT_AUTOREFERER => true,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_COOKIEFILE => $cookie,
CURLOPT_COOKIEJAR => $cookie ,
CURLOPT_SSL_VERIFYPEER => 0 ,
CURLOPT_SSL_VERIFYHOST => 0

);

curl_setopt_array($ch, $options);
$kl = curl_exec($ch);
curl_close($ch);
?>