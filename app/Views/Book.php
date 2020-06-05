<?php

namespace App\Views;

use App\Views\Main;

class Book extends Main
{
    public function content($data, $books, $users) //в Dashboard - не вызывается!
    {
        // print_r($users);//(localhost/books):$users == $authors! (стр. 25 BookControll.)
        // die;
        $options = [
            'id' => [
                'label' => 'ID'
            ],
            'image' => [
                'label' => 'Image'
            ],
            'title' => [
                'label' => 'Title'
            ],
            'description' => [
                'label' => 'Description'
            ],
            'author_id'=>[
                'label' => 'author_id'
            ],
            'status' => [
                'label' => 'Status'
            ],
            'actions' => [
                'edit' => [
                    'icon' => 'fa-pencil-alt',
                    'route' => '/books/edit'
                ],
                'delete' => [
                    'icon' => 'fa-times', 
                    'route' => '/books/delete'
                ]
            ],
        ];

        $this->table($data['data'], $options, 0, $users);
    }
}