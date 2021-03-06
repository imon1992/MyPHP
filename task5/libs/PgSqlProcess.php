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
        if($this->checkKey($key)===0)
        {
            $sql = "INSERT INTO PG_TEST(\"key\",\"data\")
                VALUES('$key','$val')";
            $queryResult = $this->query($sql);
            if($queryResult === false)
                return ['error'=>8];
            return true;
        }else
        {
            return ['error'=>11];
        }
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

     private function checkKey($key)
    {
        $sql = 'SELECT "key"
                FROM PG_TEST
                WHERE "key" = '.'\''.$key .'\''
            .' LIMIT 1';
        $result = $this->query($sql);
        $result = pg_num_rows($result);
        return $result;
    }

    public function connectToDb()
    {
        $link =pg_connect("host=localhost dbname=user1 user=user1 password=user1z");
//        //home connect
//        $link =pg_connect("host=localhost dbname=user1 user=postgres");
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
//var_dump($a->saveData('aaa','ddd'));
//var_dump($a->getData('aaa'));
//var_dump($a->deleteData('aaaa'));



//var_dump($a->query("SELECT \"key\",\"data\" FROM PG_TEST"));
//var_dump($a->query("INSERT INTO PG_TEST(\"key\",\"data\") VALUES('sumKey','100')"));

