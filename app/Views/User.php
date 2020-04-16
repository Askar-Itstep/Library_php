<?php


namespace App\Views;

use \App\Views\Main;

class User extends Main
{
    public function content($data = [])
    {
        $options = [
            'id' => [
                'label' => 'ID'
            ],
            'name' => [
                'label' => 'Name'
            ],
            'email' => [
                'label' => 'E-mail'
            ],
            'actions' => [
                'edit' => [
                    'icon' => 'fa-pencil-alt',
                    'route' => '/user/edit'
                ],
                'delete' => [
                    'icon' => 'fa-times',
                    'route' => '/user/delete'
                ]
            ],
        ];

        $this->table($data['data'], $options);
    }

}