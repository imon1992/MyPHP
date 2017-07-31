<?php
include ('simple_html_dom.php');
/*$f= fopen('/usr/home/user14/public_html/MyPHP/task8/files/file.txt','w');
var_dump($f);
*/
$c = file_get_html('https://www.google.com.ua/search?q=php+exception&rlz=1C1KMZB_enUA753UA753&oq=php+exception&aqs=chrome.0.69i59j69i60j0l4.2890j0j7&sourceid=chrome&ie=UTF-8');
echo $c;
$div = $c->find('.g h3');
//$f = file_get_html($div);
//$h = $f->find('h3');
echo $div;
var_dump($div);
//var_dump($div);

