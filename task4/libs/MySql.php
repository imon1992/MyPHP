<?php

//include ('Sql.php');
class MySql extends Sql
{
    protected $connect;

    public function __construct()
    {
        $this->connectToDb();
    }

    public function connectToDb()
    {
        $link = mysql_connect('localhost', 'user1', 'tuser1');
        //home connect
//        $link = mysql_connect('localhost', 'root', '');
        if (!$link) {
            return die('Connect Error');
         }   
       $this->connect = $link;
     }
    
    public function query($query)
    {
        $query = str_replace('"','`',$query);
        mysql_select_db('user1',$this->connect);

       $result = mysql_query($query,$this->connect);

        return $result;
    }

    public function fetchAssoc($resource)
    {
        $i =0;
        $dataArr = [];
        while ($row = mysql_fetch_assoc($resource)) {
            $row["key1"];
            $row["data"];
            $dataArr[$i]=[$row["key1"],$row["data"]];
            $i++;
        }
        return $dataArr;
    }
}
