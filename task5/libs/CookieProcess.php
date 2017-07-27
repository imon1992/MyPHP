<?
include ('iWorkData.php');
class CookieProcess implements iWorkData
{
    public function saveData($key,$val)
    {
       if(setcookie($key, $val)) 
       {
            return true;
       }else
        {
            return false;
        } 
    }

    public function getData($key)
    {
        return $_COOKIE[$key];
    }

    public function deleteData($key)
    {
        if(setcookie($key,""))
        {
            return true;
        }else
        {
            return false;
        }
    }   
}
