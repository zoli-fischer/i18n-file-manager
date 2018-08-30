<?php

namespace MVCFrame\Controller;
use MVCFrame;
use I18NFM;

class Index extends MVCFrame\Controller {

    public function HandleCommandPost($command) {
        switch ($command) {
            case 'edit-language':
                $this->SaveLanguageFromPost();
                break;
            case 'add-language':
                $this->AddLanguageFromPost();
                break;
            case 'delete-language':
                $this->DeleteLanguageFromPost();
                break;
        }
    }

    public function DeleteLanguageFromPost() {
        $data = [
            'index' => $_POST['index']
        ];
        print_r($data);
    }

    public function AddLanguageFromPost() {
        $data = [
            'index' => $_POST['index'],
            'default' => $_POST['default'],
            'name' => $_POST['name'],
            'prular_rule' => $_POST['prular_rule'],
            'dec_point' => $_POST['dec_point'],
            'thousands_sep' => $_POST['thousands_sep'],
            'date_format' => $_POST['date_format']
        ];
        print_r($data);
    }

    public function SaveLanguageFromPost() {
        $data = [
            'index' => $_POST['index'],
            'default' => $_POST['default'],
            'name' => $_POST['name'],
            'prular_rule' => $_POST['prular_rule'],
            'dec_point' => $_POST['dec_point'],
            'thousands_sep' => $_POST['thousands_sep'],
            'date_format' => $_POST['date_format']
        ];
        print_r($data);
    }

    public function printLanguages() {
        $buffer = [];
        foreach ( I18NFM\Languages::GetAll() as $language )
            $buffer[] = '<a href="javascript:{}" title="Edit" data-toggle="modal" data-target="#addLanguageModal" 
data-index="'.$language->index().'"
data-default="'.( $language->get('default') ? 1 : 0 ).'"
data-prular_rule="'.$language->get('prular_rule').'"
data-dec_point="'.$language->get('dec_point').'"
data-thousands_sep="'.$language->get('thousands_sep').'"
data-date_format="'.$language->get('date_format').'"
>'.$language->get('name').( $language->get('default') ? '<span>*</span>' : '' ).'</a>';
        return implode(', ',$buffer);
    }

}