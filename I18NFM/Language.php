<?php

namespace I18NFM;
use I18NFM;

class Language {

    private $data;

    public function __construct($data) {
        $this->data = (object)[$data];
    }

}