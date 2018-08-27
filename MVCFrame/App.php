<?php

namespace MVCFrame;
use MVCFrame;

MVCFrame\App::Init();

class App {

    private static $controllers = [];

    public static function Init() {
        spl_autoload_register('self::Autoloader');
    }

    private static function Autoloader( $class ) {
        if ( explode('\\',$class)[0] === 'MVCFrame' ) {
            $filename = realpath(__DIR__.'/..') . '/' . str_replace('\\', '/', $class) . '.php';
            require_once($filename);
        }
    }

    private static function InitRouter() {
        self::Init();
        register_shutdown_function([ __CLASS__, 'OnShutdown' ]);
    }

    public static function Route( $path, $view ) {
        self::InitRouter();
        return $path === $_SERVER['PATH_INFO'] && self::View( $view );
    }

    public static function View( $view, $options = [] ) {
        $viewpath = realpath(__DIR__ . '/View/'. MVCFrame\StringFormatter::ToCamelCase($view) . '.php');
        $ctrlpath = realpath(__DIR__ . '/Controller/'. MVCFrame\StringFormatter::ToCamelCase($view) . '.php');
        if ( file_exists($viewpath) ) {
            $controllerClass = file_exists($ctrlpath) ? "MVCFrame\\Controller\\".MVCFrame\StringFormatter::ToCamelCase($view) : "MVCFrame\\Controller";
            $controller = new $controllerClass( $view, $options );
            self::$controllers[] = $controller;
            return $controller;
        } else {
            self::TriggerError('Unable to load view: '.$viewpath, E_USER_ERROR);
        }
        return false;
    }

    private static $send404OnShutdown = true;

    public static function OnShutdown() {
        if ( self::$send404OnShutdown && count(self::$controllers) == 0 && MVCFrame\Respons::GetCode() === null && MVCFrame\Respons::GetMessage() === null && MVCFrame\Respons::GetRedirectUrl() === null ) {
            MVCFrame\Respons::SetCode(404);
            MVCFrame\Respons::SetMessage("Error 404. Page not found...");
        }
        MVCFrame\Respons::Send();
    }

    public static function TriggerError( $msg, $error_type = E_USER_NOTICE ) {
        if ( $error_type === E_USER_ERROR )            
            self::$send404OnShutdown = false;
        trigger_error($msg, $error_type);
    }

}