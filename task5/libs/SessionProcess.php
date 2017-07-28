<?php

//include ('iWorkData.php');
class SessionProcess implements iWorkData
{
     public function saveData($key,$val)
    {
        if(!session_start())
        {
            return ['error'=>1];
        }else
        {
            $_SESSION[$key] = $val;
            return true;
        }
    }

    public function getData($key)
    {
        if(!session_start())
            return ['error'=>1];
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }else
        {
            return ['error'=>0];
        }
    }

    public function deleteData($key)
    {
        if(!session_start())
            return ['error'=>1];
        if(isset($_SESSION[$key]))
        {
            unset($_SESSION[$key]);
            return true;
        }else
        {
            return ['error'=>0];
        }
    }
}
