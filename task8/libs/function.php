<?php


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

function errors($errorNumber){
    switch ($errorNumber) {
        case 0:
            return EXEC_ERROR;
    }
}