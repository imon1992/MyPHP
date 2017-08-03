<?php

include ('ActiveRecords.php');
class MySql extends ActiveRecords
{
    protected $tableField = [];
    protected $dbConnect;
    public function  __construct()
    {
       /* $sql = 'SELECT COLUMN_NAME
                FROM INFORMATION_SCHEMA.COLUMNS
                WHERE table_name ='. "'MY_TEST'";
        */
       // $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'MY_TEST'";
        $this->connectToDb();
        $this->fieldsInTable();
//var_dump($this->dbConnect);
       /* mysql_select_db('user1',$this->dbConnect);
        $result = mysql_query($sql,$this->dbConnect);
        while($row = mysql_fetch_row($result))
           $fields[]= $row;
var_dump($fields);*/
    }
    
    protected function fieldsInTable()
    {
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'MY_TEST'";
        mysql_select_db('user1',$this->dbConnect);
        $result = mysql_query($sql,$this->dbConnect);
        while($row = mysql_fetch_row($result))
            $fields[]= $row;
//var_dump($fields);
        foreach($fields as $key=>$value)
        {
            $this->tableField[] = $value[0];
        }
//var_dump($this->tableField);

    }

    public function connectToDb()
    {
        $link = mysql_connect('localhost', 'user1', 'tuser1');
        //home connect
//        $link = mysql_connect('localhost', 'root', '');
        if (!$link) {
             die(' MySql Connect Error');
         }   
       $this->dbConnect = $link;
     }
}

$c = new MySql();

