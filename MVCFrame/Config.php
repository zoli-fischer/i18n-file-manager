<?php 

namespace MVCFrame;
use MVCFrame;

class Config {

    private static $data = [];

    public static function LoadJSON( $filepath ) {
        $content = file_get_contents($filepath);
        if ( $content === false )
            MVCFrame\App::TriggerError('Unable to load config JSON: '.$filepath, E_USER_ERROR);
        $data = json_decode($content,true);
        if ( json_last_error() !== JSON_ERROR_NONE )
            MVCFrame\App::TriggerError('Config JSON parse error. '.json_last_error_msg(), E_USER_ERROR);
        self::$data = isset($data[ MVCFrame\Environment::Environment() ]) ? $data[ MVCFrame\Environment::Environment() ] : [];
    }

    public static function Get( $index ) {
        if ( self::IsSet( $index ) ) {
            $indexes = preg_split("#[\s/]+#", $index);
            $data = self::$data;
            foreach ( $indexes as $value )
                $data = $data[$value];
            return $data;
        } else {
            MVCFrame\App::TriggerError('Config variable not found: '.$index);
        }
    }

    public static function IsSet( $index ) {
        $indexes = preg_split("#[\s/]+#", $index);
        $data = self::$data;        
        foreach ( $indexes as $value ) {
            if ( isset($data[$value]) ) {
                $data = $data[$value];
            } else {
                return false;
            }
        }
        return true;
    }

    public static function Set( $index, $confValue ) {
        if ( self::IsSet( $index ) ) {
            $indexes = preg_split("#[\s/]+#", $index);
            $data = &self::$data;
            foreach ( $indexes as $value )
                $data = &$data[$value];
            return $data = $confValue;
        } else {
            MVCFrame\App::TriggerError('Config variable not found: '.$index);
        }
    }

}