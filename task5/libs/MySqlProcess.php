<?php

//include ('iWorkData.php');

class MySqlProcess implements iWorkData
{
    protected $connect;
    public function __construct()
    {
        $this->connectToDb();
    }

    public function saveData($key,$val)
    {
        $sql = "INSERT INTO MY_TEST(`key`,`data`)
                VALUES('$key','$val') ";
        $queryResult = $this->query($sql);
        if($queryResult === false)
            return ['error'=>5];
        return true;
    }

    public function getData($key)
    {
        $sql = "SELECT `data`,`key`
                FROM `MY_TEST`
                WHERE `key` = '$key'";
        $queryResult = $this->query($sql);
        if($queryResult === false)
        {
            return ['error'=>6];
        }else
        {
            return $this->fetchAssoc($queryResult);
        }
        
    }

    public function deleteData($key)
    {
        $sql = "DELETE FROM `MY_TEST`
                WHERE `key`='$key'";
        $queryResult = $this->query($sql);
        if($queryResult === false)
            return ['error'=>7];
        return true;
    }
    
    public function connectToDb()
    {
        $link = mysql_connect('localhost', 'user1', 'tuser1');
        //home connect
//        $link = mysql_connect('localhost', 'root', '');
         if (!$link)
         {
             die(' MySql Connect Error');
         }
       $this->connect = $link;
    }

    public function query($query)
    {
        mysql_select_db('user1',$this->connect);

       $result = mysql_query($query,$this->connect);

        return $result;
    }

    public function fetchAssoc($resource)
    {
        $i =0;
        $dataArr = [];
        while ($row = mysql_fetch_assoc($resource))
        {   

            $row["key"];
            $row["data"];
            $dataArr[$i]=[$row["key"],$row["data"]];
            $i++;
        }
        return $dataArr;
    }


}

