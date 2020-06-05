<?php

namespace App\Controllers;

use App\Models\Db;

class BooksController
{
    public function run()
    {
        $pdo = \App\Models\Db::get();
        $stmt = $pdo->query('
            SELECT 
                * 
            FROM 
                `books`
            ');
        $data = $stmt->fetchAll();
        // print_r($data); die;
        $stmt = $pdo->query('
            SELECT* FROM `authors`
        ');
        $authors = $stmt->fetchAll();
        $views = new \App\Views\Book();
        $views->render([ 'data' => $data ], 0, $authors);
    }

    public function runAdd()
    {   //если POST
        if (
            $_POST && !is_null($_POST['title']) && !is_null($_POST['description']) && isset($_FILES['image'])
            && !is_null($_POST['author'])
        ) {
            // echo $_POST['author']; die;
            $pdo = Db::get();
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                $dir = 'uploads/';
                $name = $dir . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $name);
            } else {
                echo 'Ошибка загрузки файла!';
                header('Location: /books');
                return;
            }
            $stmt = $pdo->prepare('
                INSERT INTO 
                    `books`  (
                        title, 
                        description, 
                        status,
                        image,
                        author_name
                        ) 
                VALUE (
                    :title, 
                    :description, 
                    :status,
                    :image,
                    :author_name
                    )
                ');
            $stmt->execute(
                [
                    ':title' => trim($_POST['title']),
                    ':description' => trim($_POST['description']),
                    ':status' => $_POST['status'] ?? 'off',
                    ':image' => $name,
                    ':author_name' => $_POST['author']
                ]
            );
            header('Location: /books');
            return;
        }
        //если GET
        $views = new \App\Views\Book\Forms\Create();
        $pdo = Db::get();
        $stmt = $pdo->query('
            SELECT* FROM `authors`
        ');
        $data = $stmt->fetchAll();
        // print_r($data); 
        $views->render(
            ['data' => $data]
        );
    }

    public function runEdit()
    {
        $pdo = Db::get();
        if ($_GET && isset($_GET['id'])) {
            $stmt = $pdo->prepare(
                'SELECT * FROM `books` WHERE id = ?'
            );
            $stmt->execute([
                $_GET['id']
            ]);
            $data = $stmt->fetch();
            $stmt = $pdo->query('
            SELECT* FROM `authors`
        ');
            $authors = $stmt->fetchAll();
            $views = new \App\Views\Book\Forms\Edit();
            $views->render($data, 0, $authors);
        }

        if ($_POST && !is_null($_POST['title']) && !is_null($_POST['description']) && isset($_FILES['image'])) {
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                $dir = 'uploads/';
                $name = $dir . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $name);
            } else {
                echo 'Ошибка загрузки файла!';
                die;
            }
            $stmt = $pdo->prepare('
                UPDATE
                    `books`
                SET
                    title = :title,
                    description = :description,
                    image = :image,
                    author_name = :author_name,
                    status = :status
                WHERE
                    id = :id
                ');
            $stmt->execute(
                [
                    ':title' => trim($_POST['title']),
                    ':description' => trim($_POST['description']),
                    ':status' => $_POST['status'] ?? 'off',
                    ':image' => $name,
                    ':author_name' => $_SESSION['auth']['name'],
                    ':id' => $_POST['id']
                ]
            );
            header('Location: /books');
            return;
        }
    }

    public function runDelete()
    {
        if ($_GET && isset($_GET['id'])) {
            $pdo = Db::get();
            $stmt = $pdo->prepare('
                SELECT 
                    image
                FROM
                    `books`
                WHERE
                    id = ?
            ');
            $stmt->execute([
                $_GET['id']
            ]);
            $data = $stmt->fetch();
            if (file_exists($data['image'])) {
                unlink($data['image']);
            }
            $stmt = $pdo->prepare('
                DELETE FROM
                    `books`
                WHERE
                    id = :id
            ');
            $stmt->execute([
                ':id' => $_GET['id']
            ]);
            header('Location: /books');
            return;
        }
    }

    public function runShow()
    {
        $pdo = \App\Models\Db::get();
        if ($_GET && isset($_GET['id'])) {
            //1 ------ доб. заказ в БД ------------------------
            $stmt = $pdo->prepare('
            INSERT INTO `orders` 
                    (book_id, user_id)
            VALUE (:book_id,  :user_id )
        ');
            $stmt->execute(
                [
                    ':book_id' => $_GET['id'],
                    ':user_id' => $_SESSION['auth']['id']
                ]
            );
            //2-----выгрузить книгу из БД на страницу -------------------------
            $stmt = $pdo->prepare('
                SELECT
                    *
                FROM
                    `books`
                WHERE
                    id = :id
            ');
            $stmt->execute([
                ':id' => $_GET['id']
            ]);
            $views = new \App\Views\Book\Forms\Show();
            $views->render(
                $stmt->fetch()
            );
        }
    }

    public function runStatus()
    {
        $pdo = \App\Models\Db::get();
        $stmt = $pdo->prepare('
            SELECT
                status
            FROM
                `books`
            WHERE
                id = :id
        ');
        $stmt->execute([
            ':id' => $_POST['id']
        ]);
        $status = $stmt->fetch();
        $stmt = $pdo->prepare('
            UPDATE
                `books`
            SET
                status = :status
            WHERE
                id = :id
        ');
        $stmt->execute([
            ':status' => $status['status'] === 'on' ? 'off' : 'on',
            ':id' => $_POST['id']
        ]);
        echo json_encode([
            'message' => 'Status success saved',
            'status' => $status['status'] === 'on' ? 'off' : 'on'
        ]);
    }
}
