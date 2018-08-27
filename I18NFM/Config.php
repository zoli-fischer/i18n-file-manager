<?php

namespace I18NFM;
use I18NFM;

class Config {

    public static function Define( $name, $value ) {
        define( __NAMESPACE__ . '\\Config\\' . $name, $value );
    }

}