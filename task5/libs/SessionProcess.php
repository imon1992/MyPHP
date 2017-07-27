<?php

include ('iWorkData.php');
class SessionProcess implements iWorkData
{
     public function saveData($key,$val)
    {
        session_start();
        $_SESSION[$key] = $val;
    }

    public function getData($key)
    {
        session_start();
        return $_SESSION[$key];
    }

    public function deleteData($key)
    {
        session_start();
        unset($_SESSION[$key]);
    }
}
/*
$c = new SessionProcess();
$c->saveData('s','value');
echo $c->getData('s');
$c->deleteData('s');
var_dump($c->getData('s'));
*/
