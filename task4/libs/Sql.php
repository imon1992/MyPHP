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

     public function from($baseName,$tableName)
     {
         $from = " FROM  \"$baseName\".\"$tableName\" ";
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
                 $where .= '"'. $columnsArr[$i] . '"' . '=' . "'" . $paramsArr[$i] . "'" . ',';
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

    public function update($baseName,$tName)
    {
        $update = "UPDATE \"$baseName\".\"$tName\"";
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

    public function insert($baseName,$tName)
    {
        $insert = "INSERT INTO \"$baseName\".\"$tName\" ";
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
    
    public function execute()
    {
        $result = '';
        if($this->select !== null){
            $result = $this->select . $this->from . $this->where;
        }
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
