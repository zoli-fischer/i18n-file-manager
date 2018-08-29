<?php

namespace MVCFrame\Controller;
use MVCFrame;
use I18NFM;

class Index extends MVCFrame\Controller {

    public function printLanguages() {
        $buffer = [];
        foreach ( I18NFM\Languages::GetAll() as $language )
            $buffer[] = '<a href="javascript:{}" title="Edit" data-toggle="modal" data-target="#addLanguageModal" 
data-index="'.$language->index().'"
data-plural_rule="'.$language->get('plural_rule').'"
data-dec_point="'.$language->get('dec_point').'"
data-thousands_sep="'.$language->get('thousands_sep').'"
data-date_format="'.$language->get('date_format').'"
>'.$language->get('name').'</a>';
        return implode(', ',$buffer);
    }

}