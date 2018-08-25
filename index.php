<?php

require_once('config.php');

if ( in_array( \I18nFileManager\Config\ENVIRONMENT, [ 'development', 'test' ] ) ) {
    error_reporting(E_ALL);
    ini_set('display_errors','on');
}

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/MVCFrame/App.php');

MVCFrame\App::Route('/','Index');

