<?php

namespace I18NFM;
use I18NFM;

class Languages {

    public static function GetAll() {
        $data = I18NFM\ConfigFile::Data();
        $languages = [];
        if ( isset($data['languages']) )
            foreach ( $data['languages'] as $index => $language )
                $languages[] = new I18NFM\Language($index,$language);

        return $languages;
    }

}