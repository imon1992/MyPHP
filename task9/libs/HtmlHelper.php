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
                $selectedOption = 'selected ';
            } 
            $option .= "<option $selectedOption value="."'$optionValuesArr[$i]'> $optionValuesArr[$i]</option>";
        }
        $select .= $option;
        $select .= '</select>';
        return $select;
    }

    public static function ulOl($ulOl,$liCount,$liValueArr)
    {
        $list = '<'.$ulOl.'>';
        for($i=0;$i<$liCount;$i++)
        {
            $list .= '<li>' . $liValueArr[$i] . '</li>';
        }
        $list .= '</' . $ulOl . '>';
        return $list;
    }

    public static function table($tableCaption=false,$trCount,$tdCount,$tdValuesArr,$thValuesArr=false,$align=false)
    {
        if($align !== false)
        {
            $tableAlign = 'align="' . $align . '"';
            $table = '<table '. $tableAlign .' class="table">';
        }else
        {
            $table = '<table class="table">';
        }

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
                $table .= '<td>' . $thValuesArr[$i] . '</td>';
            }
        }

        
        for($i=0;$i<$trCount;$i++)
        {
            $table .= '<tr>';
                for($j=0;$j<$tdCount;$j++)
                {
                   $table .= '<td>' . $tdValuesArr[$i][$j] . '</td>';
                }
            $table .= '</tr>';
        }
        $table .= '</table>';

        return $table;

    }

    public static function radio($radioCount,$radioValuesArr,$radioName,$inline =false,$radioCheckedNumber=false)
    {
        if($inline !=false)
        {
            $radio = '';
            for($i=0;$i<$radioCount;$i++)
            {
                if($radioCheckedNumber != false && $radioCheckedNumber == $i+1)
                {
                    $radio .= '<label class="radio-inline">'. '<input type="radio" ' . 'name="'.$radioName .'" value="' . $radioValuesArr[$i] .'" checked>'
                        . $radioValuesArr[$i] . '</label>';

                }else
                {
                $radio .= '<label class="radio-inline">' . '<input type="radio" ' . 'name="'.$radioName.'" value="' . $radioValuesArr[$i] .'">'
                            . $radioValuesArr[$i] . '</label>';
                }

            }
        }else
        {
            $radio ='';
            for($i=0;$i<$radioCount;$i++)
            {
                if($radioCheckedNumber != false && $radioCheckedNumber == $i+1)
                {
                    $radio .= '<div class="radio">';
                    $radio .= '<label> <input type="radio" name="'.$radioNamesArr[$i] .'" value="' . $radioValuesArr[$i]  . '" checked>'
                            . $radioValuesArr[$i] . '</label> </div>' ;
                }else
                {
                    $radio .= '<div class="radio">';
                    $radio .= '<label> <input type="radio" name="'.$radioNamesArr[$i] .'" value="' . $radioValuesArr[$i]  . '">'
                        . $radioValuesArr[$i] . '</label> </div>' ;
                }

            }
        }
        return $radio;

    }

    public static function checkBox($checkCount,$checkValuesArr,$checkNamesArr,$inline =false,$checkCheckedNumber=false)
    {
        if($inline !=false)
        {
            $checkBox = '';
            for($i=0;$i<$checkCount;$i++)
            {
                if($checkCheckedNumber != false && $checkCheckedNumber == $i+1)
                {
                    $checkBox .= '<label class="checkbox-inline">'. '<input type="checkbox" ' . 'name="'.$checkNamesArr[$i].'" value="'
                        . $checkValuesArr[$i] .'" checked>' . $checkValuesArr[$i] . '</label>';

                }else
                {
                    $checkBox .= '<label class="checkbox-inline">' . '<input type="checkbox" ' . 'name="'.$checkNamesArr[$i].'" value="'
                        . $checkValuesArr[$i] .'">' . $checkValuesArr[$i] . '</label>';
                }

            }
        }else
        {
            $checkBox ='';
            for($i=0;$i<$checkCount;$i++)
            {
                if($checkCheckedNumber != false && $checkCheckedNumber == $i+1)
                {
                    $checkBox .= '<div class="checkbox">';
                    $checkBox .= '<label> <input type="checkbox" name="'.$checkNamesArr[$i] .'" value="' . $checkValuesArr[$i]  . '" checked>'
                        . $checkValuesArr[$i] . '</label> </div>' ;
                }else
                {
                    $checkBox .= '<div class="checkbox">';
                    $checkBox .= '<label> <input type="checkbox" name="'.$checkNamesArr[$i] .'" value="' . $checkValuesArr[$i]  . '">'
                        . $checkValuesArr[$i] . '</label> </div>' ;
                }

            }
        }
        return $checkBox;

    }


}
//$c = 'HtmlHelper';
//
//$f = HtmlHelper::select('sumeName', 3, ['Sum tenx','Mere text', 'else more text'],2);
//
//$g = HtmlHelper::ulOl('ol',3,['first','second','last']);
//
//HtmlHelper::table('Obuv',2,2,[['12',12],[34,45]]);
//echo $f;
//var_dump($f);
//$f = $c->select('sumeName', 3, ['Sum tenx','Mere text', 'else more text'],2);
