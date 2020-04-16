<?php


namespace App\Controllers;


use App\Models\Db;
use App\Views\User;

class UserController
{
    public function run()
    {
        $pdo = \App\Models\Db::get();
        $stmt = $pdo->query('SELECT * FROM `users`');
        $data = $stmt->fetchAll();

        $views = new \App\Views\User();
        $views->render([
            'data' => $data
        ]);
    }

    public function runAdd()
    {
        if ($_POST) {
            $pdo = Db::get();
            $stmt = $pdo->prepare('INSERT INTO `users`  (name, email, password) VALUE(:name, :email, :password)');
            $stmt->execute([
                    ':name' => trim($_POST['name']),
                    ':password' => sha1(trim($_POST['password'])),
                    ':email' => trim($_POST['email'])
                ]
            );
            header('Location: /users');
            return;
        }
        $views = new \App\Views\User\Forms\Create();
        $views->render();
    }

    public function runEdit()
    {
        $pdo = Db::get();
        if ($_GET && isset($_GET['id'])) {
            $stmt = $pdo->prepare(
                'SELECT * FROM `users` WHERE id = ?'
            );
            $stmt->execute([
                $_GET['id']
            ]);
            $data = $stmt->fetch();
            $views = new \App\Views\User\Forms\Edit();
            $views->render($data);
        }

        if ($_POST && !is_null($_POST['name']) && !is_null($_POST['email']) && !is_null($_POST['password'])) {
            print_r($_POST);die;
            $stmt = $pdo->prepare(
                'UPDATE `users` 
                SET 
                    name = :name, 
                    email = :email, 
                    password = :password 
                WHERE 
                    id = :id
            ');
            $stmt->execute([
                    ':id' => trim($_POST['id']),
                    ':email' => trim($_POST['email']),
                    ':name' => trim($_POST['name']),
                    ':password' => sha1(trim($_POST['password']))
                ]
            );
            header('Location: /users');
            return;
        }
    }

    public function runDelete()
    {
        if ($_GET && isset($_GET['id'])) {
            $pdo = Db::get();
            $stmt = $pdo->prepare('
                DELETE FROM
                    `users`
                WHERE
                    id = :id
            ');
            $stmt->execute([
                ':id' => $_GET['id']
            ]);
            header('Location: /users');
            return;
        }

    }

}