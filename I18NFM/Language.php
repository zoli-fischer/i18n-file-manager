<?php

namespace I18NFM;
use I18NFM;

class Language {

    private $data;
    private $index;

    public function __construct($index,$data) {
        $this->data = $data;
        $this->index = $index;
    }

    public function get($index) {
        return isset($this->data[$index]) ? $this->data[$index] : '';
    }

    public function index() {
        return $this->index;
    }

}