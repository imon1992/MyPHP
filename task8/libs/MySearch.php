<?php
$ch = curl_init('https://www.google.com.ua/search?q=php+exception&rlz=1C1KMZB_enUA753UA753&oq=php+exep&aqs=chrome.1.69i57j0l4j69i64.5815j0j7&sourceid=chrome&ie=UTF-8');
$f= fopen('/usr/home/user14/public_html/MyPHP/task8/files/file.txt','w');
curl_setopt($ch, CURLOPT_FILE,$f);


curl_exec($ch);
var_dump($ch);

