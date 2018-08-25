<?php

namespace I18nFileManager\Config;

function def( $name, $value ){
    define( __NAMESPACE__ . '\\' . $name, $value );
};

// Environment / Development
def('ENVIRONMENT','development'); // development, test, production

