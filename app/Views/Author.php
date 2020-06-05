<?php

namespace App\Views;

use App\Views\Main;

class Author extends Main
{
    public function content($data, $books, $user) 
    {
        $options = [
            'id' => [
                'label' => 'ID'
            ],
            'biographia' => [
                'label' => 'biographia'
            ],
            'name'=>[
                'label' => 'author_name'
            ],
            'actions' => [
                'edit' => [
                    'icon' => 'fa-pencil-alt',
                    'route' => '/authors/edit'
                ],
                'delete' => [
                    'icon' => 'fa-times', 
                    'route' => '/authors/delete'
                ]
            ],
        ];

        $this->table($data['data'], $options);
    }
}