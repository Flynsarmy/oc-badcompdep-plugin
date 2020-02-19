<?php namespace Flynsarmy\Badcompdep\Components;

use Request;
use Cms\Classes\ComponentBase;

class SingleOptionMethod extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Single Options Method',
            'description' => "This component can't be set correctly and locks the UI."
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
                'required'    => true,
            ],
        ];
    }

    public function getCategoryOptions()
    {
        return ['foo' => 'Foo'];
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
