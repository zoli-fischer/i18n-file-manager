<?php

namespace I18NFM;
use I18NFM;

class ConfigFile {

    private static $data = [];

    public static function Load() {
        $filepath = realpath(I18NFM\Config\I18NDataPath . "/config.json");
        $content = file_get_contents($filepath);
        if ( !$content )
            MVCFrame\App::TriggerError('Unable to load i18n config JSON: '.$filepath);
        $data = json_decode($content,true);
        if ( json_last_error() !== JSON_ERROR_NONE )
            MVCFrame\App::TriggerError('I18n config JSON parse error. '.json_last_error_msg());
        self::$data = $data;
    }

    public static function Data() {
        return self::$data;
    }

}