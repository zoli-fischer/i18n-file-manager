<?php

// Get environment
MVCFrame\Environment::Load(__DIR__ . '/.environment');

// Load environmental config
MVCFrame\Config::LoadJSON(__DIR__ . '/config.json');

// Defines
I18NFM\Config::Define('I18NDataPath', realpath(__DIR__ . '/i18n-data'));