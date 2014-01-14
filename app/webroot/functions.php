<?php
function phone_number($num="")
{
    if($num)
    {
        $number = "(";
        for($i=0;$i<strlen($num);$i++)
        {
            $number = $number.$num[$i];
            if($i==2)
            $number = $number.") ";
            if($i==5)
            $number = $number.'-';
        }
        return $number;
    }
    else 
    return "";
} 
?>