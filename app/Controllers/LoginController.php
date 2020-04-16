<?php


namespace App\Controllers;


use App\Models\Db;
use App\Views\Login;

class LoginController
{
    public function run()
    {
        if ($_POST) {
            $pdo = Db::get();
            $stmt = $pdo->prepare('
                SELECT * FROM `users` WHERE `email` = :email AND password = :password
            ');

            $stmt->execute([
                ':email' => trim($_POST['email']),
                ':password' => sha1(trim($_POST['password']))
            ]);
            $user = $stmt->fetch();
            if ($user) {
                $_SESSION['auth'] = $user;
                header('Location: /');
            }
        }

        $view = new Login();
        $view->render();
    }

    public function runLogout()
    {
        if ($_SESSION['auth']) {
            unset($_SESSION['auth']);
            header('Location: /login');
            return;
        }
    }
}