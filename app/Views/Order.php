<?php
namespace App\Views;
use App\Views\Main;

class Order extends Main {

    public function content($data=[], $books=[], $users=[]) 
    {
        // print_r($users); 
        // echo'!!!!!!';
        // die;
        $options = [
            'id' => [
                'label' => 'ID'
            ],
            'book_id' => [
                'label' => 'book_id'
            ],
            'user_id' => [
                'label' => 'user_id'
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

        $this->table($data['data'], $options, $books['books'], $users['users']);
    }












}







?>