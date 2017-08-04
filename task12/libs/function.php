<?php


function errors($errorNumber){
    switch ($errorNumber) {
        case 0:
            return EXECUTE_ERROR;
        case 1:
            return CONNECT_ERROR;
//        case 2:
//            return SET_COOKIE_ERROR;
//        case 3:
//            return NO_COOKIE_KYE_ERROR;
//        case 4:
//            return COOKIE_DELETED_ERROR;
//        case 5:
//            return MYSQL_INSERT_ERROR;
//        case 6:
//            return MYSQL_SELECT_ERROR;
//        case 7:
//            return MYSQL_DELETED_ERROR;
//        case 8:
//            return PG_INSERT_ERROR;
//        case 9:
//            return PG_SELECT_ERROR;
//        case 10:
//            return PG_DELETED_ERROR;
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