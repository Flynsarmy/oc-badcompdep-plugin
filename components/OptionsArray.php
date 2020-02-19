<?php namespace Flynsarmy\Badcompdep\Components;

use Request;
use Cms\Classes\ComponentBase;

class OptionsArray extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Options Array',
            'description' => "Manual cat selection required, Post works as expected"
        ];
    }

    public function defineProperties()
    {
        return [
            'category' => [
                'title'       => 'Category',
                'description' => 'The Category to display.',
                'type'        => 'dropdown',
                'required'    => true,
                'options'     => ['foo' => 'Foo', 'bar' => 'Bar'],
            ],
            'post' => [
                'title'       => 'Post',
                'description' => 'The post to display.',
                'type'        => 'dropdown',
                'depends'     => ['category'],
            ],
        ];
    }

    public function getPostOptions()
    {
        $category = Request::input('category');

        switch ($category) {
            case 'foo':
                return ['foopost1' => 'Foo Post 1', 'foopost2' => 'Foo Post 2'];
            case 'bar':
                return ['barpost1' => 'Bar Post 1', 'barpost2' => 'Bar Post 2'];
            default:
                return ['' => 'No category selected?'];
        }
    }
}
