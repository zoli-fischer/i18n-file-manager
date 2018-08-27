<?php 

namespace MVCFrame;
use MVCFrame;

class Environment {

    private static $environment = 'development';

    public static function Load( $filepath ) {
        $content = file_get_contents($filepath);
        if ( $content === false )
            MVCFrame\App::TriggerError('Unable to load environment: '.$filepath, E_USER_ERROR);
        self::$environment = $content;

        if ( self::isProduction() ) {
            ini_set('display_errors','off');
        }
    }

    public static function isDevelopment() {
        return self::$environment === 'development';
    }

    public static function isProduction() {
        return self::$environment === 'production';
    }

    public static function isTest() {
        return self::$environment === 'test';
    }

    public static function Environment() {
        return self::$environment;
    }

}