<?php

error_reporting(E_ALL);
ini_set('display_errors','on');

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/MVCFrame/App.php');
require_once(__DIR__ . '/I18NFM/Main.php');
require_once(__DIR__ . '/config.php');

I18NFM\ConfigFile::Load();

MVCFrame\App::Route('/','Index');

