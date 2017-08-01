<?php

class HtmlHelper
{
    public static function select($name,$optionCount,$optionValuesArr,$selectedOptionNumber =false,$size=1,$multiple=false)
    {
       $select = '<select class="form-control" ';
        if($size>1)
        {
            $selectSize = ' size='."'$size'";
            $select .= $selectSize;
        }
        if($multiple !=false)
        {
            $selectMultiple = ' multiple';
            $select .= $selectMultiple;
        }
        if($multiple !=false)
        {
            $selectName = 'name[]='."'$name'";
        }else
        {
            $selectName = 'name=' ."'$name'"; 
        }
        $select .= $selectName . '>';
        $option = ''; 
        for($i=0;$i<$optionCount;$i++)
        {
            if($i === $selectedOptionNumber)
            {
                $optionSelect .= 'selected ';
            } 
            $option .= "<option $optionSelect velue='"."'$optionValuesArr[$i]'> $optionValuesArr[$i]</option>";
        }
        $select .= $option;
        $select .= '</select>';
var_dump($select);    
    return $select;
    }

    public static function ulOl($ulOl,$liCount,$liValueArr)
    {
        $list = '<'.$ulOl.' class="list-unstyled">';
        for($i=0;$i<$liCount;$i++)
        {
            $list .= '<li>' . $liValueArr[$i] . '</li>';
        }
        $list .= '</' . $ulOl . '>';
        return $list;
    }

    public static function table($tableCaption=false,$trCount,$tdCount,$tdValuesArr,$thValuesArr=false)
    {
        $table = '<table class="table">';
        
        if($tableCaption !==false)
        {
            $table .= '<caption>' . $tableCaption . '</caption>';
        }

        if($thValuesArr !==false)
        {
            $table .= '<tr>';
            $thCount = sizeof($thValuesArr);
            for($i=0;$i<$thCount;$i++)
            {
                $table .= '<td>' . $thValuesArr . '</td>';
            }
        }

        
        for($i=0;$i<$trCount;$i++)
        {
            $table .= '<tr>';
                for($j=0;$j<$tdCount;$j++)
                {           
                   $table .= '<td>' . $tdValuesArr[$i][$j] . '<td>'; 
                }
            $table .= '</tr>';
        }
        return $table;
    }
}
/*$c = 'HtmlHelper';

$f = HtmlHelper::select('sumeName', 3, ['Sum tenx','Mere text', 'else more text'],2);

$g = HtmlHelper::ulOl('ol',3,['first','second','last']);

HtmlHelper::table('Obuv',2,2,[['12',12],[34,45]]);
echo $f;*/
//var_dump($f);
//$f = $c->select('sumeName', 3, ['Sum tenx','Mere text', 'else more text'],2);
