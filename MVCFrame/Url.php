<?php 

namespace MVCFrame;
use MVCFrame;

class Url {

    public static function GetBaseUrl() {
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
            $base_url = sprintf( "%s://%s/%s/", $http, $hostname, (preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY))[0] );
        } else {
            $base_url = 'http://localhost/';
        }
        return $base_url;
    }

    public static function Recache($url) {
        $url_parts = explode('?',$url);
        $filepath = realpath($url_parts[0]);
        $version = filemtime($filepath);
        $url = str_replace(dirname(realpath($_SERVER['SCRIPT_FILENAME'])), '', $filepath);
        array_shift($url_parts);
        return rtrim(self::GetBaseUrl(),'/').$url.( count($url_parts) > 0 ? '?'.implode('?',$url_parts) : '' ).( count($url_parts) > 0 ? '&' : '?' ).'recache='.$version;
    }

}