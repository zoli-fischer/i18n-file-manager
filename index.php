<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/MVCFrame/App.php');

MVCFrame\Environment::Load( __DIR__ . '/.environment' );
MVCFrame\Config::LoadJSON( __DIR__ . '/config.json' );

MVCFrame\App::Route('/','Index');

