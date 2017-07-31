<?php

include ('config.php');
include ('libs/iWorkData.php');
include ('libs/function.php');
include ('libs/CookieProcess.php');
include ('libs/SessionProcess.php');
include ('libs/MySqlProcess.php');
include ('libs/PgSqlProcess.php');
include ('libs/errorHundlerFunction.php');

set_error_handler('myHandler', E_ALL);


$cookie = new CookieProcess();
$cookieSaveResult = $cookie->saveData('myCook','new value');
if($cookieSaveResult !== true)
{
    $cookieSaveError = errors($cookieGetResult['error']);
}
//var_dump($_COOKIE['myCooki']);
$cookieGetResult = $cookie->getData('myCook');
if(is_array($cookieGetResult))
{
    if(array_key_exists('error',$cookieGetResult))
        $cookieGetError = errors($cookieGetResult['error']);
}

$cookieDeletedResult = $cookie->deleteData('myCook');
if($cookieDeletedResult !== true)
{
    $cookieDeletedError = errors($cookieDeletedResult['error']);
}


$session = new SessionProcess();
$sessionSaveResult = $session->saveData('key','val');
if($cookieSaveResult !== true)
{
    $sessionSaveError = errors($cookieSaveResult['error']);
}

$sessionGetResult = $session->getData('key');
if(is_array($sessionGetResult))
{
    if(array_key_exists('error',$sessionGetResult))
        $sessionGetError = errors($sessionGetResult['error']);
}
$sessionDeletedResult = $session->deleteData('key');
if($sessionDeletedResult !== true)
{
    $sessionDeleterError = errors($sessionDeletedResult[['error']]);
}


$mySql = new MySqlProcess();
$mySqlSaveResult = $mySql->saveData('key','vallll');
if($mySqlSaveResult !== true)
{
    $mySqlSaveError = errors($mySqlSaveResult['error']);
}

$mySqlGetResult = $mySql->getData('key');
if(is_array($mySqlGetResult))
{
    if(array_key_exists('error',$mySqlGetResult))
        $mySqlGetError = errors($mySqlGetResult['error']);
}

$mySqlDeletedResult = $mySql->deleteData('key');
if($mySqlDeletedResult !== true)
{
    $mySqlDeleterError = errors($mySqlDeletedResult['error']);
}


$pg = new PgSqlProcess();
$pgSaveResult = $pg->saveData('key','data');
if($pgSaveResult !== true)
{
    $pgSaveError = errors($pgSaveResult['error']);
}

$pgGetResult = $pg->getData('key');
if(is_array($pgGetResult))
{
    if(array_key_exists('error',$pgGetResult))
        $pgGetError = errors($pgGetResult['error']);
}

$pgDeletedResult = $pg->deleteData('key');
if($pgDeletedResult !== true)
{
    $pgDeletedError = errors($pgDeletedResult['error']);
}

include ('templates/index.php');
//$cookie = new CookieProcess();
//var_dump($cookieSaveResult);
//var_dump($cookieGetResult);
//var_dump($cookieDeletedResult);
//
//
//var_dump($sessionSaveResult);
//var_dump($sessionGetResult);
//var_dump($sessionDeletedResult);
//$cookie = new CookieProcess();
//$cookieSaveResult = $cookie->saveData('affds','cookies');
//$cookieGetResult = $cookie->getData('new');
//$cookieDeletedResult = $cookie->deleteData('');
//var_dump($cookieSaveResult);
//var_dump($cookieGetResult);
//var_dump($cookieDeletedResult);


//setcookie('php', 'php',time()+3600);
//var_dump($_COOKIE['php']);
