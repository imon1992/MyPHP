<?php

class MyTest extends ActiveRecords
{
    protected $tableField = [];
    protected $dbConnect;

    public function  __construct()
    {
        $this->connectToDb();
        $this->fieldsInTable();
    }

    public function __set($name,$value)
    {
        if(array_key_exists($name,$this->tableField))
        {
            $this->tableField[$name] = $value;
        }else
        {
            throw new Exception('No this field in table');
        }
    }

    public function save()
    {
        $fieldValuesArr = $this->fieldValuesArr();
        if(sizeof($fieldValuesArr[0]) !== 0)
        {
            $sql = $this->insert('MY_TEST')->values($fieldValuesArr[0],$fieldValuesArr[1])->execute();
            $sql = str_replace('"','`',$sql);

            $result = $this->query($sql);

            return $result;
        }else
        {
            throw new Exception('No Fields to Add');
        }
    }

    public function update()
    {
        $fieldValuesArr = $this->fieldValuesArr();
        $sql = parent::update('MY_TEST')->set($fieldValuesArr[0],$fieldValuesArr[1])->execute();
        $sql = str_replace('"','`',$sql);

        $result = $this->query($sql);

        return $result;

    }

    public function read()
    {
        $columns = $this->getAllColumns();
        $fieldValuesArr = $this->fieldValuesArr();
        $sql= $this->select($columns)->from('MY_TEST')->where($fieldValuesArr[0],$fieldValuesArr[1])->execute();
        $sql = str_replace('"','`',$sql);

        $result = $this->query($sql);

        $result = $this->fetchAssoc($result);

        return $result;
    }

    public function deleted()
    {
        $fieldValuesArr = $this->fieldValuesArr();
        $sql = $this->delet()->from('MY_TEST')->where($fieldValuesArr[0],$fieldValuesArr[1])->execute();
        $sql = str_replace('"','`',$sql);

        $result = $this->query($sql);

        return $result;
    }

    private function getAllColumns()
    {
        foreach($this->tableField as $field=>$value)
        {
                $fieldsArr[] = $field;
        }

        return $fieldsArr;

    }

    private function fetchAssoc($resource)
    {
        while ($row = mysql_fetch_assoc($resource)) {
            $dataArr[]=$row;
        }
        return $dataArr;
    }

    private function fieldValuesArr()
    {
        foreach($this->tableField as $field=>$value)
        {
            if($value != false)
            {
                $fieldsArr[] = $field;
                $valuesArr[] = $value;
                $this->tableField[$field]='';
            }
        }
        if(sizeof($fieldsArr) === 0)
        {
            throw new Exception('No find fields');
        }

        return [$fieldsArr,$valuesArr];
    }

    private function query($sql)
    {
        mysql_select_db(DB_MY_SQL,$this->dbConnect);

        $result = mysql_query($sql,$this->dbConnect);
        return $result;
    }
    
    protected function fieldsInTable()
    {
        $sql = $this->select(['column_name'])->from('information_schema.columns')->where(['table_name'],['MY_TEST'])->execute();
        $sql = str_replace('"','`',$sql);
        $result = $this->query($sql);
        while($row = mysql_fetch_row($result))
            $fields[]= $row;
        foreach($fields as $key=>$value)
        {
            $this->tableField[$value[0]]='';
        }

    }

    private function connectToDb()
    {
        $link = mysql_connect(HOST_MY_SQL, USER_MY_SQL, PASSWORD_MY_SQL);
        //home connect
//        $link = mysql_connect(HOST_MY_SQL, USER_MY_SQL, PASSWORD_MY_SQL);
        if (!$link) {
             die(' MySql Connect Error');
         }   
       $this->dbConnect = $link;
     }
}

