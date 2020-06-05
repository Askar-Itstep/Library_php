<?php

namespace App\Controllers;

use App\Models\Db;
use App\Views\Order;

class OrdersController
{
    public function run()
    {
        $pdo = Db::get();
        $stmt = $pdo->query('
            SELECT  *FROM  `orders`
            ');
        $data = $stmt->fetchAll();
        //2
        $stmt = $pdo->query('
            SELECT  *FROM `books`
        ');
        $books = $stmt->fetchAll();
        //3
        $stmt = $pdo->query('
            SELECT  *FROM `users`
        ');
        $users = $stmt->fetchAll();
        // print_r($users); 
        // die;

        $views = new \App\Views\Order();
        $views->render(
            ['data' => $data ],
            ['books'=> $books],
            ['users' => $users]
    );
    }

    
    //---------------------------------- больше не нужны ---------------------------------------------
    // public function runAdd()
    // {
        // if ($_POST && !is_null($_POST['title']) && !is_null($_POST['description']) && isset($_FILES['image'])) {
        //     $pdo = Db::get();
        //     if(is_uploaded_file($_FILES['image']['tmp_name'])) {
        //         $dir = 'uploads/';
        //         $name = $dir . $_FILES['image']['name'];
        //         move_uploaded_file($_FILES['image']['tmp_name'], $name);
        //     } else {
        //         echo 'Ошибка загрузки файла!';
        //         die;
        //     }
        //     $stmt = $pdo->prepare('
        //         INSERT INTO 
        //             `books`  (
        //                 title, 
        //                 description, 
        //                 status,
        //                 image,
        //                 user_name
        //                 ) 
        //         VALUE (
        //             :title, 
        //             :description, 
        //             :status,
        //             :image,
        //             :user_name
        //             )
        //         ');
        //     $stmt->execute([
        //             ':title' => trim($_POST['title']),
        //             ':description' => trim($_POST['description']),
        //             ':status' => $_POST['status'] ?? 'off',
        //             ':image' => $name,
        //             ':user_name' => $_SESSION['auth']['name']
        //         ]
        //     );
        //     header('Location: /books');
        //     return;
        // }
        // $views = new \App\Views\Book\Forms\Create();
        // $views->render();
    // }


    // public function runEdit()
    // {
    //     $pdo = Db::get();
    //     if ($_GET && isset($_GET['id'])) {
    //         $stmt = $pdo->prepare(
    //             'SELECT * FROM `books` WHERE id = ?'
    //         );
    //         $stmt->execute([
    //             $_GET['id']
    //         ]);
    //         $data = $stmt->fetch();
    //         $views = new \App\Views\Book\Forms\Edit();
    //         $views->render($data);
    //     }

    //     if ($_POST && !is_null($_POST['title']) && !is_null($_POST['description']) && isset($_FILES['image'])) {
    //         if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    //             $dir = 'uploads/';
    //             $name = $dir . $_FILES['image']['name'];
    //             move_uploaded_file($_FILES['image']['tmp_name'], $name);
    //         } else {
    //             echo 'Ошибка загрузки файла!';
    //             die;
    //         }
    //         $stmt = $pdo->prepare('
    //             UPDATE
    //                 `books`
    //             SET
    //                 title = :title,
    //                 description = :description,
    //                 image = :image,
    //                 user_name = :user_name,
    //                 status = :status
    //             WHERE
    //                 id = :id
    //             ');
    //         $stmt->execute([
    //                 ':title' => trim($_POST['title']),
    //                 ':description' => trim($_POST['description']),
    //                 ':status' => $_POST['status'] ?? 'off',
    //                 ':image' => $name,
    //                 ':user_name' => $_SESSION['auth']['name'],
    //                 ':id' => $_POST['id']
    //             ]
    //         );
    //         header('Location: /books');
    //         return;
    //     }
    // }

    // public function runDelete()
    // {
    //     if ($_GET && isset($_GET['id'])) {
    //         $pdo = Db::get();
    //         $stmt = $pdo->prepare('
    //             SELECT 
    //                 image
    //             FROM
    //                 `books`
    //             WHERE
    //                 id = ?
    //         ');
    //         $stmt->execute([
    //             $_GET['id']
    //         ]);
    //         $data = $stmt->fetch();
    //         if(file_exists($data['image'])) {
    //             unlink($data['image']);
    //         }
    //         $stmt = $pdo->prepare('
    //             DELETE FROM
    //                 `books`
    //             WHERE
    //                 id = :id
    //         ');
    //         $stmt->execute([
    //             ':id' => $_GET['id']
    //         ]);
    //         header('Location: /books');
    //         return;
    //     }
    // }

}
