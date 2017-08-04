<?php
class Sql
 {
//    protected $sql;
    protected $sqlOrder;
    protected $select;
    protected $from;
    protected $where;
    protected $delet;
    protected $update;
    protected $set;
    protected $insert;
    protected $values;
     public function select($columns)
     {
         $columnsCount = sizeof($columns);
         $select = "SELECT ";
         for($i=0;$i<$columnsCount;$i++)
         {
             if($columnsCount == ($i+1))
             {
                 $select .=  '"' .$columns[$i] .'"';
             }else
             {
                 $select .= '"' .$columns[$i] .'"' . ',';
             }
         }
         $this->select= $select;
         if(array_search('*',$columns) !== false)
             $this->select= null;
         $this->sqlOrder[] = 'select';
         return $this;
     }

     public function from($tableName)
     {
         $from = " FROM  $tableName ";
         $this->from .= $from;
         $this->sqlOrder[] = 'from';
         return $this;
     }

     public function where($columnsArr,$paramsArr)
     {
         $columnsCount = sizeof($columnsArr);
         $where = " WHERE ";
         for($i=0;$i<$columnsCount;$i++)
         {
             if($columnsCount == ($i+1))
             {
                 $where .= '"'. $columnsArr[$i] . '"'  . '=' . "'" . $paramsArr[$i] . "'";
             }else
             {
                 $where .= '"'. $columnsArr[$i] . '"' . '=' . "'" . $paramsArr[$i] . "'" . ',';
             }
         }
         $this->where  .= $where;
         $this->sqlOrder[] = 'where';
         return $this;
    }

    public function delet()
    {
        $delet = "DELETE ";
        $this->delet = $delet;
        $this->sqlOrder[] = 'delet';
        return $this;
    }

    public function update($tName)
    {
        $update = "UPDATE $tName";
        $this->update = $update;
        $this->sqlOrder[] = 'update';
        return $this;
    }   

    public function set($columnsArr,$paramsArr)
    {
        $set = " SET ";
        $columnsCount = sizeof($columnsArr);
        for($i=0;$i<$columnsCount;$i++)
        {
              if($columnsCount == ($i+1))
              {
                  $set .= '"' . $columnsArr[$i] . '"' . '=' . "'" . $paramsArr[$i] . "'";
              }else
              {
                  $set .= '"' . $columnsArr[$i] . '"' . '=' . "'" . $paramsArr[$i] . "'" . ',';
              }

        }
        $this->set = $set;
        $this->sqlOrder[] = 'set';
        return $this;
    }

    public function insert($tName)
    {
        $insert = "INSERT INTO $tName ";
        $this->insert = $insert;
        $this->sqlOrder[] = 'insert';
        return $this;
    }
    public function values($columnsArr,$paramsArr)
    {
        $this->insert .= '(';
        $columns = '';
        $values = ' VALUES (';
        $columnsCount = sizeof($columnsArr);
         for($i=0;$i<$columnsCount;$i++)
         {
               if($columnsCount == ($i+1))
               {
                   $columns .= '"'. $columnsArr[$i] .'"' ;
               }else
              {
                  $columns .= '"'. $columnsArr[$i] .'"' . ',';
              }
         }
        $this->insert .= $columns . ')';

        $paramsCount = sizeof($paramsArr);
        for($i=0;$i<$paramsCount;$i++)
        {
            if($paramsCount == ($i+1))
            {
                $values .= "'" . $paramsArr[$i] . "'";
            }else
            {
                $values .= "'" . $paramsArr[$i] . "'" . ',';
            }
        }
        $values .= ')';
        $this->values = $values;
        $this->sqlOrder[] = 'values';
        return $this;
    }

    public function execute()
    {
        $result = '';
//var_dump($this->sqlOrder);
        foreach($this->sqlOrder as $values)
        {
            $result .= $this->$values;
            $this->$values = null;
        }
        $this->sqlOrder = null;

//        foreach($this as$key=> $value)
//        {
////            $this->$key = null;
//        }

        return $result;
    }
}

//$c = new Sql();
//var_dump($c->insert('MY_TEST')->values(['key','data'],['user14','Add insert text'])->execute());
//var_dump($c->select(['data'])->from('MY_TEST')->where(['key'],['user14'])->execute());
//var_dump($c->update('MY_TEST')->set(['data'],['new value'])->execute());
//var_dump($c->delet()->from('MY_TEST')->where(['key'],['user14'])->execute());