<?php namespace Flynsarmy\Badcompdep;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'Bad Compnoent Dependency Example',
            'description' => 'Demonstrates an issue with loading depdenent component params via AJAX',
            'author'      => 'Flyn San',
            'icon'        => 'icon-pencil'
        ];
    }

    public function registerComponents()
    {
        return [
            'Flynsarmy\Badcompdep\Components\OptionsMethod' => 'bcdOptionsMethod',
            'Flynsarmy\Badcompdep\Components\SingleOptionMethod' => 'bcdSingleOptionMethod',
            'Flynsarmy\Badcompdep\Components\OptionsArray'    => 'bcdOptionsArray',
        ];
    }
}
