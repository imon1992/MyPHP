<?php
// наш обработчик ошибок
function myHandler($level, $message, $file, $line, $context) {
    // в зависимости от типа ошибки формируем заголовок сообщения
    switch ($level) {
        case E_WARNING:
            $type = 'Warning';
            break;
        case E_NOTICE:
            $type = 'Notice';
            break;
        default;
            return false;
    }
    // выводим текст ошибки
//    var_dump($message);
//    echo 'dada';
    return true;
}

// регистрируем наш обработчик, он будет срабатывать на для всех типов ошибок
set_error_handler('myHandler', E_ALL);

$c = '';
foreach($c as $val){};