<?php 
    function removePrevText($str, $prefix)
    {
        if (0 === stripos($str, $prefix)) {
            $str = substr($str, strlen($prefix)) . '';
        }
        return $str;
    }
