<?php

namespace MVCFrame\Controller\Partial;
use MVCFrame;

class Header extends MVCFrame\ControllerPartial {

    protected function GetTitle() {
        return ( MVCFrame\Environment::isDevelopment() ? 'Development | ' : ( MVCFrame\Environment::isTest() ? 'Test | ' : '' ) ) . $this->GetOption('title');
    }

}