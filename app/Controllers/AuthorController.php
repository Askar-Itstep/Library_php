<?php

namespace App\Controllers;

use App\Models\Db;

class AuthorController
{
    public function run()
    {
        $pdo = \App\Models\Db::get();
        $stmt = $pdo->query('
            SELECT 
                * 
            FROM 
                `authors`
            ');
        $data = $stmt->fetchAll();
        // print_r($data); die;
        $views = new \App\Views\Author();
        $views->render([
            'data' => $data
        ]);
    }

    public function runAdd()
    {   //если POST
        if ($_POST && !is_null($_POST['author_name']) && !is_null($_POST['biographia']) ) {            
        // echo $_POST['biographia']; die;
            $pdo = Db::get();           
            $stmt = $pdo->prepare('
                INSERT INTO 
                    `authors`  (
                        name, 
                        biographia 
                        ) 
                VALUE (
                    :name, 
                    :biographia  
                    )
                ');
            $stmt->execute(
                [
                    ':biographia' => trim($_POST['biographia']),
                    ':name' => $_POST['author_name']
                ]
            );
            header('Location: /authors');
            return;
        }
        //если GET
        $views = new \App\Views\Author\Forms\Create();
        $views->render();
    }

    public function runEdit()
    {
        $pdo = Db::get();
        if ($_GET && isset($_GET['id'])) {
            $stmt = $pdo->prepare(
                'SELECT * FROM `authors` WHERE id = ?'
            );
            $stmt->execute([
                $_GET['id']
            ]);
            $data = $stmt->fetch();
            $views = new \App\Views\Author\Forms\Edit();
            $views->render($data);
        }

        if ($_POST && !is_null($_POST['name']) && !is_null($_POST['biographia']) ) {                
            $stmt = $pdo->prepare('
                UPDATE
                    `authors`
                SET
                    name = :name,
                    biographia = :biographia,
                WHERE
                    id = :id
                ');
            $stmt->execute(
                [
                    ':name' => trim($_POST['author_name']),
                    ':biographia' => trim($_POST['biographia']),
                    ':id' => $_POST['id']
                ]
            );
            header('Location: /authors');
            return;
        }
    }

    public function runDelete()
    {
        if ($_GET && isset($_GET['id'])) {
            $pdo = Db::get();            
            $stmt = $pdo->prepare('
                DELETE FROM
                    `authors`
                WHERE
                    id = :id
            ');
            $stmt->execute([
                ':id' => $_GET['id']
            ]);
            header('Location: /authors');
            return;
        }
    }

}
