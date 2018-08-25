<?php

namespace MVCFrame;
use MVCFrame;

class ControllerPartial extends MVCFrame\Controller {

    function __construct( $view, $options = [] ) {        
        $this->options = $options;
        $this->view = MVCFrame\StringFormatter::ToCamelCase($view);
        $this->viewpath = realpath(__DIR__ . '/View/Partial/'. $this->view . '.php');
        if ( file_exists($this->viewpath) ) {
            include( $this->viewpath );
        } else {
            MVCFrame\App::TriggerError('Unable to load partial view: '.$filepath, E_USER_ERROR);
        }
    }

}