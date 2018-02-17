<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 17.02.2018
 * Time: 13:57
 */

namespace Lans8097\LaravelWidget;


class Widget
{
    protected $widgets = [];

    public function __construct()
    {
        $this->widgets = config('laravel-widgets');
    }

    public function show($widgetName, $data = [])
    {
        if(array_key_exists($widgetName, $this->widgets))
        {
            $Widget = new $this->widgets[$widgetName]($data);

            return $Widget->execute();
        }
    }
}