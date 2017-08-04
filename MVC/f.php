<?php
// наш обработчик ошибок
//function myHandler($level, $message, $file, $line, $context) {
//    // в зависимости от типа ошибки формируем заголовок сообщения
//    switch ($level) {
//        case E_WARNING:
//            $type = 'Warning';
//            break;
//        case E_NOTICE:
//            $type = 'Notice';
//            break;
//        default;
//            return false;
//    }
//    // выводим текст ошибки
////    var_dump($message);
////    echo 'dada';
//    return true;
//}
//
//// регистрируем наш обработчик, он будет срабатывать на для всех типов ошибок
//set_error_handler('myHandler', E_ALL);
//
//$c = '';
//foreach($c as $val){};
$vv = [[[[]]],['2'],[3]];
////var_dump($v);
//$level = 0;
////$v = current($array);
//while (is_array($vv)) {
//    $level++;
//    $v = current($vv);
//}

function a($arr)
{
$c=1;
//    $c++;
    foreach($arr as $val)
    {
        if(is_array($val)){
//    $c =1;
            a($val);
        }
    }
            $c++;
    return $c;
//    $c++;
}
var_dump(a($vv));
//echo a($vv);
//if(is_array($vv))
//{
//    foreach($vv as $val)
//}
//echo $level;