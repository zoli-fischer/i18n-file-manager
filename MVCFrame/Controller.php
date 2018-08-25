<?php

namespace MVCFrame;
use MVCFrame;

class Controller {

    protected $options = [];
    protected $view;
    protected $viewpath;

    function __construct( $view, $options = [] ) {
        $this->options = $options;
        $this->view = MVCFrame\StringFormatter::ToCamelCase($view);
        $this->viewpath = realpath(__DIR__ . '/View/'. $this->view . '.php');
        if ( file_exists($this->viewpath) ) {
            include( $this->viewpath );
        } else {
            MVCFrame\App::TriggerError('Unable to load view: '.$this->viewpath, E_USER_ERROR);
        }
    }

    public function GetOptions() {
        return $this->options;
    }

    public function SetOption( $index, $value ) {
        return $this->options[$index] = $value;
    }

    public function GetOption( $index ) {
        if ( isset($this->options[$index]) )
            return $this->options[$index];
    }

    protected $controllers = [];

    public function Partial( $view, $options = [] ) {
        $viewpath = realpath(__DIR__ . '/View/Partial/'. MVCFrame\StringFormatter::ToCamelCase($view) . '.php');
        $ctrlpath = realpath(__DIR__ . '/Controller/'. MVCFrame\StringFormatter::ToCamelCase($view) . '.php');        
        if ( file_exists($viewpath) ) {
            $controllerClass = file_exists($ctrlpath) ? "MVCFrame\\Controller\\Partial\\".MVCFrame\StringFormatter::ToCamelCase($view) : "MVCFrame\\ControllerPartial";
            $controller = new $controllerClass( $view, $options );
            $this->controllers[] = $controller;
            return $controller;
        } else {
            MVCFrame\App::TriggerError('Unable to load partial view: '.$viewpath, E_USER_ERROR);
        }
        return false;
    }

}