<?php

namespace I18NFM;
use I18NFM;

I18NFM\Main::Init();

class Main {

    private static $initialized = false;

    public static function Init() {
        if ( !self::$initialized ) {
            self::$initialized = true;
            spl_autoload_register(__NAMESPACE__ . '\Main::Autoloader');            
        }
    }

    private static function Autoloader( $class ) {
        if ( explode('\\',$class)[0] === 'I18NFM' ) {
            $filename = realpath(__DIR__.'/..') . '/' . str_replace('\\', '/', $class) . '.php';
            require_once($filename);
        }
    }

}