<?php

function errors($errorNumber){
    switch ($errorNumber) {
        case 0:
            return NO_SESSION_KYE_ERROR;
        case 1:
            return SESSION_START_ERROR;
        case 2:
            return SET_COOKIE_ERROR;
        case 3:
            return NO_COOKIE_KYE_ERROR;
        case 4:
            return COOKIE_DELETED_ERROR;
        case 5:
            return MYSQL_INSERT_ERROR;
        case 6:
            return MYSQL_SELECT_ERROR;
        case 7:
            return MYSQL_DELETED_ERROR;
        case 8:
            return PG_INSERT_ERROR;
        case 9:
            return PG_SELECT_ERROR;
        case 10:
            return PG_DELETED_ERROR;
    }
}