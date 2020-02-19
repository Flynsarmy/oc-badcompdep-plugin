<?php namespace Flynsarmy\Badcompdep\Components;

use Request;
use Cms\Classes\ComponentBase;

class OptionsMethod extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Options Method',
            'description' => "Cat selected by default but Post can't see it"
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
            ],
            'post' => [
                'title'       => 'Post',
                'description' => 'The post to display.',
                'type'        => 'dropdown',
                'depends'     => ['category'],
            ],
        ];
    }

    public function getCategoryOptions()
    {
        return ['foo' => 'Foo', 'bar' => 'Bar'];
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
