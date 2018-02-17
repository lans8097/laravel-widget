<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 17.02.2018
 * Time: 14:23
 */

namespace Lans8097\LaravelWidget;


class TestWidget implements WidgetContract
{
    public function execute()
    {
        return view('Widgets::TestWidget');
    }
}