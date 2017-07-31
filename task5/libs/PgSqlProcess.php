<?php

//include ('iWorkData.php');

class PgSqlProcess implements iWorkData
{
    protected $connect;
    public function __construct()
    {
        $this->connectToDb();
    }

    public function saveData($key,$val)
    {
        //$insertStr = $key . '=>' . $val;
        $sql = "INSERT INTO PG_TEST(\"key\",\"data\")
                VALUES('$key','$val') ";
//        var_dump($sql);
        $queryResult = $this->query($sql);
//        var_dump($queryResult);
        if($queryResult === false)
            return ['error'=>8];
        return true;
    }

    public function getData($key)
    {
        $sql = "SELECT \"data\",\"key\"
                FROM PG_TEST
                WHERE \"key\" = '$key'";
        $queryResult = $this->query($sql);
        if($queryResult === false)
        {
            return ['error'=>9];
        }else
        {
            return $this->fetchAssoc($queryResult);
        }

     }

    public function deleteData($key)
    {
        $sql = "DELETE FROM PG_TEST
                WHERE \"key\"='$key'";
        $queryResult = $this->query($sql);
        if($queryResult === false)
            return ['error'=>10];
        return true;
    }

    public function connectToDb()
    {
         $link =pg_connect("host=localhost dbname=user1 user=user1 password=user1z");
        //home connect
//        $link =pg_connect("host=localhost dbname=user1 user=postgres");
//        if (!$link) {
//            throw new Exception('connect error.');
//        }
        if (!$link)
         {
             die('PG Connect Error');
         }
       $this->connect = $link;
    }

    public function query($query)
    {

       $result = pg_query($this->connect,$query);

        return $result;
    }

    public function fetchAssoc($resource)
    {
        $i =0;
        $dataArr = [];
        while ($row = pg_fetch_assoc($resource))
        {
            $row["key"];
            $row["data"];
            $dataArr[$i]=[$row["key"],$row["data"]];
            $i++;
        }
        return $dataArr;
    }


 }
//$a = new PgSqlProcess();
//$a->connectToDb();

//var_dump($a->saveData('sumKey','100'));
//var_dump($a->saveData('aaaa','ddd'));
//var_dump($a->getData('aaaa'));
//var_dump($a->deleteData('aaaa'));




