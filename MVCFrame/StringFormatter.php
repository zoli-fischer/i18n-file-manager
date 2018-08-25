<?php 

namespace MVCFrame;
use MVCFrame;

class StringFormatter {

    public static function ToCamelCase($str, $capitalise_first_char = true) {
        if($capitalise_first_char) {
            $str[0] = strtoupper($str[0]);
        }
        return preg_replace_callback('/_([a-z])/', function($c){
            return strtoupper($c[1]);
        }, $str);
    }

}