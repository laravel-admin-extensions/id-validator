<?php

namespace Encore\Admin\IdValidator;

use Encore\Admin\Extension;

class IdValidator extends Extension
{
    public $name = 'id-validator';

    public $menu = [
        'title' => '身份证校验',
        'path'  => 'id-validator',
        'icon'  => 'fa-credit-card',
    ];
}