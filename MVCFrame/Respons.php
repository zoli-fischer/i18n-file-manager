<?php

namespace MVCFrame;
use MVCFrame;

class Respons {

    private static $content_type = null;
    private static $content_charset = null;

    private static $redirect_url = null;

    private static $code = null;
    private static $message = null;

    public static function SetEncoding( $content_type = 'text/html', $charset = 'utf-8' ) {
        self::$content_type = $content_type;
        self::$charset = $charset;
    }

    public static function Redirect( $url, $replace = true ) {
        if ( $replace || ( !$replace && self::$redirect_url !== null ) )
            self::$redirect_url = $url;
    }

    public static function GetRedirectUrl() {
        return self::$redirect_url;
    }

    public static function SetCode( $code ) {
        self::$code = $code;
    }

    public static function GetCode() {
        return self::$code;
    }

    public static function SetMessage( $message ) {
        self::$message = $message;
    }

    public static function GetMessage() {
        return self::$message;
    }

    public static function Send() {
        if ( self::$content_type !== null && self::$charset !== null ) 
            header('Content-Type: '.self::$content_type.( self::$charset != '' ? '; charset='.self::$charset : '' ) );

        if ( self::$redirect_url !== null ) 
            header('location: '.self::$redirect_url, true );

        if ( self::$code !== null ) {
            $text = false;
            switch ( intval(self::$code) ) {
                case 100: $text = 'Continue'; break;
                case 101: $text = 'Switching Protocols'; break;
                case 200: $text = 'OK'; break;
                case 201: $text = 'Created'; break;
                case 202: $text = 'Accepted'; break;
                case 203: $text = 'Non-Authoritative Information'; break;
                case 204: $text = 'No Content'; break;
                case 205: $text = 'Reset Content'; break;
                case 206: $text = 'Partial Content'; break;
                case 300: $text = 'Multiple Choices'; break;
                case 301: $text = 'Moved Permanently'; break;
                case 302: $text = 'Moved Temporarily'; break;
                case 303: $text = 'See Other'; break;
                case 304: $text = 'Not Modified'; break;
                case 305: $text = 'Use Proxy'; break;
                case 400: $text = 'Bad Request'; break;
                case 401: $text = 'Unauthorized'; break;
                case 402: $text = 'Payment Required'; break;
                case 403: $text = 'Forbidden'; break;
                case 404: $text = 'Not Found'; break;
                case 405: $text = 'Method Not Allowed'; break;
                case 406: $text = 'Not Acceptable'; break;
                case 407: $text = 'Proxy Authentication Required'; break;
                case 408: $text = 'Request Time-out'; break;
                case 409: $text = 'Conflict'; break;
                case 410: $text = 'Gone'; break;
                case 411: $text = 'Length Required'; break;
                case 412: $text = 'Precondition Failed'; break;
                case 413: $text = 'Request Entity Too Large'; break;
                case 414: $text = 'Request-URI Too Large'; break;
                case 415: $text = 'Unsupported Media Type'; break;
                case 500: $text = 'Internal Server Error'; break;
                case 501: $text = 'Not Implemented'; break;
                case 502: $text = 'Bad Gateway'; break;
                case 503: $text = 'Service Unavailable'; break;
                case 504: $text = 'Gateway Time-out'; break;
                case 505: $text = 'HTTP Version not supported'; break;	
            }
            if ( $text !== false ) {
                $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
                header($protocol.' '.self::$code.' '.$text);
            }
        }

        if ( self::$message !== null )
            echo self::$message;
    }

}