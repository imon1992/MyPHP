<?php
class Sql
{
    public $sqlSelect;
    public function select($columns)
    {
        $columnsCount = sizeof($columns);
        $select = "SELECT ";
        for($i=0;$i<$columnsCount;$i++)
        {
            if($columnsCount == ($i+1))
            {
                $select .= $columns[$i];
            }else
            {
                $select .= $columns[$i] . ',';
            }
        }
        $this->sqlSelect = $select; 
        return $this;
    }
    
    public function from($tableName)
    {
        $from = "FROM $tableName";
        $this->sqlSelect .= $from;
        return $this;
    }
    
    public function where($columnsArr,$paramsArr)
    {
        $columnsCount = sizeof($columnsArr);
        $where = "WHERE ";
        for($i=0;$i<$columnsCount;$i++)
        {
            if($columnsCount == ($i+1))
            {
                $where .= $columnsArr[$i] . '=' . $paramsArr[$i];
            }else
            {
                $where .= $columnsArr[$i] . '=' . $paramsArr[$i] . ',';
            }
        }
        $this->sqlSelect  .= $where;
        return $this;
    }
    
    
}
/*
$c = new Sql();
$c->select(['*'])->from('t1')->where(['a','ab'],[1,2]);
echo $c->sqlSelect;
*/
