<?
//include ('iWorkData.php');
class CookieProcess implements iWorkData
{
    public function saveData($key,$val)
    {
       if(setcookie($key, $val,time()+3600))
       {
            return true;
       }else
        {
            return ['error'=>2];
        } 
    }

    public function getData($key)
    {
        if($_COOKIE[$key] !== null)
        {
            return $_COOKIE[$key];
        }else
        {
            return ['error'=>3];
        }
    }

    public function deleteData($key)
    {
        if(setcookie($key,""))
        {
            return true;
        }else
        {
            return ['error'=>4];
        }
    }   
}
