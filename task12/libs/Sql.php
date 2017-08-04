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
    protected $screeningBrackets;
    public function select($columns)
    {
        $columnsCount = sizeof($columns);
        $select = "SELECT ";
        for($i=0;$i<$columnsCount;$i++)
        {
            if($columnsCount == ($i+1))
            {
                $select .=  $this->screeningBrackets .$columns[$i] . $this->screeningBrackets;
            }else
            {
                $select .= $this->screeningBrackets .$columns[$i] .$this->screeningBrackets . ',';
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
                $where .= $this->screeningBrackets. $columnsArr[$i] . $this->screeningBrackets . '=' . $paramsArr[$i] ;
            }else
            {
                $where .= $this->screeningBrackets. $columnsArr[$i] . $this->screeningBrackets . '=' . $paramsArr[$i] . ' AND ';
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
                $set .= $this->screeningBrackets . $columnsArr[$i] . $this->screeningBrackets . '='  . $paramsArr[$i] ;
            }else
            {
                $set .= $this->screeningBrackets . $columnsArr[$i] . $this->screeningBrackets . '='  . $paramsArr[$i]  . ',';
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
                $columns .= $this->screeningBrackets. $columnsArr[$i] .$this->screeningBrackets ;
            }else
            {
                $columns .= $this->screeningBrackets. $columnsArr[$i] .$this->screeningBrackets . ',';
            }
        }
        $this->insert .= $columns . ')';

        $paramsCount = sizeof($paramsArr);
        for($i=0;$i<$paramsCount;$i++)
        {
            if($paramsCount == ($i+1))
            {
                $values .= $paramsArr[$i] ;
            }else
            {
                $values .= $paramsArr[$i] . ',';
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
        foreach($this->sqlOrder as $values)
        {
            $result .= $this->$values;
            $this->$values = null;
        }
        $this->sqlOrder = null;


        return $result;
    }
}
