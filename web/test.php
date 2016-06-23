<?php

function WordSum($word)
{
    $cnt = 0;
    $word = strtoupper(trim($word));
    $len = strlen($word);

    for($i = 0; $i < $len; $i++)
    {
        $cnt += ord($word[$i]) - 64; 
    }

    return $cnt;
}

var_dump(WordSum("cação"));
var_dump(WordSum("cacao"));