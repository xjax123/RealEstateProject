<?php
    function scrub($str) {
        $newstr = "";
        $newstr = str_replace("'","", $str);
        $newstr = str_replace('"',"", $newstr);
        return $newstr;
    }
?>