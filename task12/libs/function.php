<?php


function errors($errorNumber){
    switch ($errorNumber) {
        case 0:
            return EXECUTE_ERROR;
        case 1:
            return CONNECT_ERROR;
    }
}

function myHandler($level, $message, $file, $line, $context) {
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
    return true;
}