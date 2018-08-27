<?php 

namespace MVCFrame;
use MVCFrame;

class Url {

    public static function GetBaseUrl() {
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
            $base_url = sprintf( "%s://%s/%s/", $http, $hostname, (preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY))[0] );
        } else {
            $base_url = 'http://localhost/';
        }
        return $base_url;
    }

}