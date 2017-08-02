<?php

class Sql
 {
//    protected $sql;
    protected $select;
    protected $from;
    protected $where;
    protected $delet;
    protected $update;
    protected $set;
    protected $insert;
    protected $values;
    protected $distinct;
    protected $innerJoin;
    protected $leftJoin;
    protected $rightJoin;
    protected $crossJoin;
    protected $naturalJoin;
    protected $group;
    protected $having;
    protected $order;
    protected $limit;

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
         return $this;
     }
     public function from($tableName)
     {
         $from = " FROM  $tableName ";
         $this->from .= $from;
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
                 $where .= '"'. $columnsArr[$i] . '"' . '=' . "'" . $paramsArr[$i] . "'" . ' AND ';
             }
         }
         $this->where  .= $where;
         return $this;
    }
    public function delet()
    {
        $delet = "DELETE ";
        $this->delet = $delet;
        return $this;
    }
    public function update($tName)
    {
        $update = "UPDATE $tName";
        $this->update = $update;
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
        return $this;
    }
    public function insert($tName)
    {
        $insert = "INSERT INTO $tName ";
        $this->insert = $insert;
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
        return $this;
    }

    public function distinct()
    {
        $distinct = ' DISTINCT ';
    }

    public function group($groupByArr)
    {
        $groupBy = 'GROUP BY ';
        $groupByCount = sizeof($groupByArr);
        for($i=0,$i<$groupByCount;$i++)
        {
            if($groupByCount == $i+1)
            {
                $groupBy .= $groupByArr[$i] ;
            }else
            {
                $groupBy .= $groupByArr[$i] . ',';
            }
        }
        $this->group = $groupBy;
    }

    public function having($agrFunctionArr,$columnsArr,$singArr,$valuesArr)
    {   
        $having = 'HAVING '
        $agrFunctionCount = sizeof($agrFunctionArr);
        for($i=0;$i<$agrFunctionCount;$i++)
        {
            if($agrFunctionCount == $i+1)
            {   
                $having .= $agrFunctionArr[$i] .'(' . $columnsArr[$i] . ') ' . $singArr[$i] . ' ' . $valuesArr[$i];
            }else
            {
                $having .= $agrFunctionArr[$i] .'(' . $columnsArr[$i] . ') ' . $singArr[$i] . ' ' . $valuesArr[$i] . ' AND ';
            }
        }
        $this->having = $having;
    }

    public function order($columnsArr,$askDeskArr)
    {
        $oreder = ' ORDER BY ';
        $columnsCount = sizeof($columnsArr);
        for($i=0;$i<$columnsCount,$i++)
        {
            if($columnsCount == $i+1)
            {
                $order .= $columnsArr[$i] . ' ' . $askDeskArr[$i];
            }else
            {
                $order .= $columnsArr[$i] . ' ' . $askDeskArr[$i] . ',';
            }
        }
        $this->order = $order;
    }

    public function limit($firstValue,$secondValue = false)
    {
        $limit = 'LIMIT ' . $firstValue;
        if($secondValue !==false && is_numeric($secondValue))
            $limit .= ',' . $secondValue;
        $this->limit = $limit;
    }

    public function innerJoin($joinTableArr,$joinFielArr,$onJoinTableArr,$onJoinFieldArr)
    {
        $innerJoin = '';
        $joinTableCount = sizeof($joinTableArr);
        for($i=0;$i<$joinTableCount;$i++)
        {
            $innerJoin = 'INNER JOIN ' . $joinTableArr[$i] . ' ON ' . $joinTableArr[$i] . '.' .$joinFieldArr[$i] . ' = '
                            $joinTableArr[$i] .'.'.$onJoinFieldArr[$i];
        }
        $this->innerJoin = $innerJoin;
    }

    public function leftJoin($joinTableArr,$joinFielArr,$onJoinTableArr,$onJoinFieldArr)
    {
        $leftJoin = '';
        $joinTableCount = sizeof($joinTableArr);

        for($i=0;$i<$joinTableCount;$i++)
        {
           $innerJoin = 'LEFT OUTER JOIN ' . $joinTableArr[$i] . ' ON ' . $joinTableArr[$i] . '.' .$joinFieldArr[$i] . ' = '
                           $joinTableArr[$i] .'.'.$onJoinFieldArr[$i];
        }
        
        $this->leftJoin = $leftJoin;

    }

    public function rightJoin($joinTableArr,$joinFielArr,$onJoinTableArr,$onJoinFieldArr)
    {
        $rightJoin = '';
        $joinTableCount = sizeof($joinTableArr);

        for($i=0;$i<$joinTableCount;$i++)
        {
           $innerJoin = 'RIGHT OUTER JOIN ' . $joinTableArr[$i] . ' ON ' . $joinTableArr[$i] . '.' .$joinFieldArr[$i] . ' = '
                           $joinTableArr[$i] .'.'.$onJoinFieldArr[$i];
        }

    }
    
    public function crossJoin($joinTableArr)
    {
        $crossJoin = '';
        $joinTableCount = sizeof($joinTableArr);
        for($i=0;$i<$joinTableCount;$i++)
        {
            $crossJoin .= ' CROSS JOIN ' . $joinTableArr[$i];
        }
        $this->crossJoin = $crossJoin;
    }

    public function naturalJoin($joinTableArr)
    {
        $naturalJoin = '';
        $joinTableCount = sizeof($joinTableArr);
        for($i=0;$i<$joinTableCount;$i++)
        {
            $naturalJoin .= ' CROSS JOIN ' . $joinTableArr[$i];
        }
        $this->naturalJoin = $naturalJoin;
    }


    public function execute()
    {
        $result = '';
        if($this->select !== null){
            $result = $this->select . $this->from . $this->where;
        }
        if($this->select !== null && $this->distinct !== null)
            $result = $this->select . $this->distinct . $this->where;
        if($this->delet !== null){
            $result = $this->delet . $this->from . $this->where;
        }
        if($this->update !== null){
            $result = $this->update . $this->set . $this->where;
        }
        if($this->insert !== null && $this->set !== null){
            $result = $this->insert . $this->set;
        }
        if($this->insert !== null && $this->values !== null){
            $result = $this->insert . $this->values;
        }
        $this->select = null;
        $this->from = null;
        $this->where = null;
        $this->delet= null;
        $this->update= null;
        $this->set= null;
        $this->insert= null;
        $this->values= null;
        return $result;
    }
}

$c = new Sql();
$a = $c->select(['key','data'])->from('My_TEST')->where(['data','key'],[10,11])->execute();
var_dump($a);
